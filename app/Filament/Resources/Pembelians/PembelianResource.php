<?php

namespace App\Filament\Resources\Pembelians;

use App\Filament\Resources\Pembelians\Pages\CreatePembelian;
use App\Filament\Resources\Pembelians\Pages\EditPembelian;
use App\Filament\Resources\Pembelians\Pages\ListPembelians;
use App\Models\Pembelian;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PembelianResource extends Resource
{
    protected static ?string $model = Pembelian::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Pembelian';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Pembelian')
                    ->schema([
                        DatePicker::make('tanggal_pembelian')
                            ->required()
                            ->default(now()),
                        Select::make('id_supplier')
                            ->label('Supplier')
                            ->relationship('supplier', 'nama_supplier')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->createOptionForm([
                                TextInput::make('nama_supplier')->required(),
                                TextInput::make('no_telp')->tel(),
                                TextInput::make('alamat'),
                            ]),
                        Select::make('id_user')
                            ->label('Petugas')
                            ->relationship('user', 'name')
                            ->default(fn () => auth()->id())
                            ->disabled()
                            ->dehydrated(),
                    ])->columns(3),

                Section::make('Detail Item')
                    ->schema([
                        Repeater::make('detailPembelian')
                            ->relationship()
                            ->schema([
                                Select::make('id_obat')
                                    ->label('Obat')
                                    ->relationship('obat', 'nama_obat')
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, $set) {
                                        $obat = \App\Models\Obat::find($state);
                                        if ($obat) {
                                            $set('harga_beli', $obat->harga_beli);
                                        }
                                    })
                                    ->columnSpan(4),
                                TextInput::make('jumlah')
                                    ->numeric()
                                    ->default(1)
                                    ->required()
                                    ->reactive()
                                    ->afterStateUpdated(fn ($state, $set, $get) => $set('subtotal', $state * $get('harga_beli'))
                                    )
                                    ->columnSpan(2),
                                TextInput::make('harga_beli')
                                    ->label('Harga Beli Satuan')
                                    ->numeric()
                                    ->prefix('Rp')
                                    ->required()
                                    ->reactive()
                                    ->afterStateUpdated(fn ($state, $set, $get) => $set('subtotal', $state * $get('jumlah'))
                                    )
                                    ->columnSpan(3),
                                TextInput::make('subtotal')
                                    ->numeric()
                                    ->prefix('Rp')
                                    ->disabled()
                                    ->dehydrated() // Agar tetap dikirim ke server/disimpan
                                    ->columnSpan(3),
                            ])
                            ->columns(12)
                            ->live()
                            ->afterStateUpdated(function ($get, $set) {
                                $details = collect($get('detailPembelian'));
                                $total = $details->sum(fn ($item) => ($item['jumlah'] ?? 0) * ($item['harga_beli'] ?? 0));
                                $set('total_harga', $total);
                            }),

                        TextInput::make('total_harga')
                            ->label('Total Pembelian')
                            ->numeric()
                            ->prefix('Rp')
                            ->readOnly()
                            ->default(0)
                            ->columnSpanFull()
                            ->extraInputAttributes(['style' => 'font-size: 1.5rem; font-weight: bold; text-align: right;']),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tanggal_pembelian')
                    ->date()
                    ->sortable(),
                TextColumn::make('supplier.nama_supplier')
                    ->label('Supplier')
                    ->searchable(),
                TextColumn::make('total_harga')
                    ->money('IDR')
                    ->sortable(),
                TextColumn::make('user.name')
                    ->label('User'),
                TextColumn::make('created_at')
                    ->date(),
            ])
            ->filters([])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPembelians::route('/'),
            'create' => CreatePembelian::route('/create'),
            'edit' => EditPembelian::route('/{record}/edit'),
        ];
    }
}
