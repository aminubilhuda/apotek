<?php

namespace App\Filament\Resources\TransaksiPenjualans;

use App\Filament\Resources\TransaksiPenjualans\Pages\CreateTransaksiPenjualan;
use App\Filament\Resources\TransaksiPenjualans\Pages\EditTransaksiPenjualan;
use App\Filament\Resources\TransaksiPenjualans\Pages\ListTransaksiPenjualans;
use App\Models\Obat;
use App\Models\TransaksiPenjualan;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TransaksiPenjualanResource extends Resource
{
    protected static ?string $model = TransaksiPenjualan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Transaksi';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                Section::make('Rincian Obat')
                    ->schema([
                        Repeater::make('detailTransaksi')
                            ->relationship()
                            ->label(false)
                            ->schema([
                                Select::make('id_obat')
                                    ->label('Obat')
                                    ->relationship('obat', 'nama_obat')
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                        $obat = Obat::find($state);
                                        $harga = $obat->harga_jual ?? 0;
                                        $set('harga_satuan', $harga);
                                        $set('subtotal', $harga * (int) $get('jumlah'));
                                        // Update grand total
                                        $allDetails = $get('../../detailTransaksi');
                                        $grandTotal = collect($allDetails)->sum('subtotal');
                                        $set('../../total_harga', $grandTotal);
                                    })
                                    ->columnSpan(['md' => 4]),
                                TextInput::make('jumlah')
                                    ->numeric()
                                    ->default(1)
                                    ->minValue(1)
                                    ->required()
                                    ->reactive()
                                    ->live(debounce: 250)
                                    ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                        $set('subtotal', (float) $get('harga_satuan') * (int) $state);
                                        // Update grand total
                                        $allDetails = $get('../../detailTransaksi');
                                        $grandTotal = collect($allDetails)->sum('subtotal');
                                        $set('../../total_harga', $grandTotal);
                                    })
                                    ->columnSpan(['md' => 2]),
                                TextInput::make('harga_satuan')
                                    ->numeric()
                                    ->prefix('Rp')
                                    ->disabled()
                                    ->dehydrated()
                                    ->columnSpan(['md' => 2]),
                                TextInput::make('subtotal')
                                    ->numeric()
                                    ->prefix('Rp')
                                    ->disabled()
                                    ->dehydrated()
                                    ->columnSpan(['md' => 2]),
                            ])
                            ->orderable()
                            ->defaultItems(1)
                            ->minItems(1)
                            ->cloneable()
                            ->addActionLabel('Tambah Obat')
                            ->columns(['md' => 10]),
                    ])
                    ->columnSpan(2),

                Section::make('Ringkasan Transaksi')
                    ->schema([
                        \Filament\Forms\Components\DateTimePicker::make('tanggal_transaksi')
                            ->required()
                            ->default(now()->timezone('Asia/Jakarta')),
                        Select::make('id_pelanggan')
                            ->label('Pelanggan')
                            ->relationship('pelanggan', 'nama_pelanggan')
                            ->searchable()
                            ->preload()
                            ->createOptionForm([
                                TextInput::make('nama_pelanggan')
                                    ->required()
                                    ->maxLength(100),
                                TextInput::make('no_telp')
                                    ->label('No. Telepon')
                                    ->tel()
                                    ->maxLength(20),
                                TextInput::make('alamat')
                                    ->maxLength(255),
                            ]),
                        TextInput::make('total_harga')
                            ->label('Total')
                            ->numeric()
                            ->prefix('Rp')
                            ->readOnly()
                            ->extraAttributes(['class' => 'text-2xl font-bold text-right']),
                        Select::make('metode_pembayaran')
                            ->options([
                                'Tunai' => 'Tunai',
                                'Transfer' => 'Transfer',
                                'QRIS' => 'QRIS',
                            ])
                            ->default('Tunai')
                            ->required(),
                        Select::make('id_user')
                            ->label('Kasir')
                            ->relationship('user', 'name')
                            ->default(fn () => auth()->id())
                            ->required()
                            ->disabled()
                            ->dehydrated(),
                    ])
                    ->columnSpan(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tanggal_transaksi')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('pelanggan.nama_pelanggan')
                    ->label('Pelanggan')
                    ->searchable(),
                TextColumn::make('total_harga')
                    ->money('IDR')
                    ->sortable(),
                TextColumn::make('metode_pembayaran'),
                TextColumn::make('user.name')
                    ->label('User'),
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
            RelationManagers\DetailTransaksiRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTransaksiPenjualans::route('/'),
            'create' => CreateTransaksiPenjualan::route('/create'),
            'edit' => EditTransaksiPenjualan::route('/{record}/edit'),
        ];
    }

    // Metode untuk memanipulasi data sebelum disimpan (Create)
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Hitung ulang detail transaksi
        $data = $this->calculateDetailTransaksi($data);

        // Hitung ulang total harga keseluruhan
        $data['total_harga'] = collect($data['detailTransaksi'])->sum('subtotal');

        return $data;
    }

    // Metode untuk memanipulasi data sebelum disimpan (Edit)
    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Hitung ulang detail transaksi
        $data = $this->calculateDetailTransaksi($data);

        // Hitung ulang total harga keseluruhan
        $data['total_harga'] = collect($data['detailTransaksi'])->sum('subtotal');

        return $data;
    }

    // Fungsi bantu untuk menghitung detail transaksi
    private function calculateDetailTransaksi(array $data): array
    {
        if (! isset($data['detailTransaksi']) || ! is_array($data['detailTransaksi'])) {
            return $data;
        }

        foreach ($data['detailTransaksi'] as $index => $detail) {
            // Ambil data obat berdasarkan id_obat
            $obat = \App\Models\Obat::find($detail['id_obat']);

            if ($obat) {
                // Perbarui harga_satuan berdasarkan data obat saat ini
                $data['detailTransaksi'][$index]['harga_satuan'] = $obat->harga_jual;

                // Hitung ulang subtotal berdasarkan jumlah dan harga_satuan
                $jumlah = $detail['jumlah'] ?? 1; // Default ke 1 jika tidak ada
                $data['detailTransaksi'][$index]['subtotal'] = $jumlah * $obat->harga_jual;
            } else {
                // Jika obat tidak ditemukan, set default atau lakukan penanganan error
                $data['detailTransaksi'][$index]['harga_satuan'] = 0;
                $data['detailTransaksi'][$index]['subtotal'] = 0;
            }
        }

        return $data;
    }
}
