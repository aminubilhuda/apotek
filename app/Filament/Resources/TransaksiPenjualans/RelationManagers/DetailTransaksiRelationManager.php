<?php

namespace App\Filament\Resources\TransaksiPenjualans\RelationManagers;

use App\Models\Obat;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Actions\EditAction;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Forms\Components\Select;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Collection;
use Filament\Resources\RelationManagers\RelationManager;

class DetailTransaksiRelationManager extends RelationManager
{
    protected static string $relationship = 'detailTransaksi';

    protected static ?string $recordTitleAttribute = 'id_detail';

    protected static ?string $title = 'Detail Transaksi';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('id_obat')
                    ->relationship('obat', 'nama_obat')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set, $get) {
                        if ($state) {
                            $obat = \App\Models\Obat::find($state);
                            if ($obat) {
                                $set('harga_satuan', $obat->harga_jual);
                                // Recalculate subtotal
                                $jumlah = $get('jumlah', 1);
                                $set('subtotal', $obat->harga_jual * $jumlah);
                            }
                        }
                    }),
                TextInput::make('jumlah')
                    ->required()
                    ->numeric()
                    ->minValue(1)
                    ->default(1)
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set, $get) {
                        $harga = $get('harga_satuan', 0);
                        $set('subtotal', $state * $harga);
                    }),
                TextInput::make('harga_satuan')
                    ->required()
                    ->numeric()
                    ->prefix('Rp')
                    ->disabled(),
                TextInput::make('subtotal')
                    ->required()
                    ->numeric()
                    ->prefix('Rp')
                    ->disabled(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('obat.nama_obat')
                    ->label('Obat')
                    ->searchable(),
                TextColumn::make('jumlah')
                    ->sortable(),
                TextColumn::make('harga_satuan')
                    ->money('IDR'),
                TextColumn::make('subtotal')
                    ->money('IDR'),
            ])
            ->filters([])
            ->headerActions([
                CreateAction::make()
                    ->using(function (array $data): Model {
                        // Validate stock
                        $obat = \App\Models\Obat::find($data['id_obat']);
                        if ($obat->stok < $data['jumlah']) {
                            throw new \Exception("Stok tidak mencukupi. Stok tersedia: {$obat->stok}");
                        }
                        
                        // Set harga_satuan and calculate subtotal
                        $data['harga_satuan'] = $obat->harga_jual;
                        $data['subtotal'] = $obat->harga_jual * $data['jumlah'];
                        
                        $detail = static::getModel()::create($data);
                        
                        // Update stock
                        $obat->decrement('stok', $data['jumlah']);
                        
                        // Update total in parent transaction
                        $transaksi = $detail->transaksi;
                        $transaksi->update([
                            'total_harga' => $transaksi->detailTransaksi->sum('subtotal')
                        ]);
                        
                        return $detail;
                    }),
            ])
            ->actions([
                EditAction::make()
                    ->using(function (Model $record, array $data): Model {
                        // Validate stock for edit
                        $obat = \App\Models\Obat::find($data['id_obat']);
                        $additional = $data['jumlah'] - $record->jumlah;
                        if ($obat->stok < $additional) {
                            throw new \Exception("Stok tidak mencukupi. Stok tersedia: {$obat->stok}");
                        }
                        
                        // Set harga_satuan and calculate subtotal
                        $data['harga_satuan'] = $obat->harga_jual;
                        $data['subtotal'] = $obat->harga_jual * $data['jumlah'];
                        
                        $record->update($data);
                        
                        // Update stock
                        if ($additional !== 0) {
                            $obat->increment('stok', -$additional);
                        }
                        
                        // Update total in parent transaction
                        $transaksi = $record->transaksi;
                        $transaksi->update([
                            'total_harga' => $transaksi->detailTransaksi->sum('subtotal')
                        ]);
                        
                        return $record;
                    }),
                DeleteAction::make()
                    ->before(function (Model $record): void {
                        // Restore stock before deleting
                        $obat = $record->obat;
                        $obat->increment('stok', $record->jumlah);
                    })
                    ->after(function (Model $record): void {
                        // Update total in parent transaction
                        $transaksi = $record->transaksi;
                        $transaksi->update([
                            'total_harga' => $transaksi->detailTransaksi->sum('subtotal')
                        ]);
                    }),
            ])
            ->bulkActions([
                DeleteBulkAction::make()
                    ->before(function (Collection $records): void {
                        // Restore stock for all records before deleting
                        foreach ($records as $record) {
                            $obat = $record->obat;
                            $obat->increment('stok', $record->jumlah);
                        }
                    })
                    ->after(function (Collection $records): void {
                        // Update total in parent transaction
                        if ($records->isNotEmpty()) {
                            $transaksi = $records->first()->transaksi;
                            $transaksi->update([
                                'total_harga' => $transaksi->detailTransaksi->sum('subtotal')
                            ]);
                        }
                    }),
            ]);
    }
}