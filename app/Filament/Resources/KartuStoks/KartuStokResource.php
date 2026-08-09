<?php

namespace App\Filament\Resources\KartuStoks;

use App\Filament\Resources\KartuStoks\Pages\ListKartuStoks;
use App\Models\KartuStok;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class KartuStokResource extends Resource
{
    protected static ?string $model = KartuStok::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChartBar;

    protected static ?string $navigationLabel = 'Kartu Stok';

    protected static ?string $modelLabel = 'Kartu Stok';

    protected static ?string $pluralModelLabel = 'Kartu Stok';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('obat.nama_obat')
                    ->label('Obat')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('jenis')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'masuk' => 'success',
                        'keluar' => 'danger',
                        'penyesuaian' => 'warning',
                    }),
                TextColumn::make('jumlah')
                    ->numeric(),
                TextColumn::make('stok_awal')
                    ->numeric()
                    ->color('gray'),
                TextColumn::make('stok_akhir')
                    ->numeric()
                    ->weight('bold'),
                TextColumn::make('keterangan')
                    ->wrap(),
                TextColumn::make('user.name')
                    ->label('User'),
            ])
            ->filters([
                SelectFilter::make('jenis')
                    ->options([
                        'masuk' => 'Masuk',
                        'keluar' => 'Keluar',
                        'penyesuaian' => 'Penyesuaian',
                    ]),
                SelectFilter::make('id_obat')
                    ->label('Obat')
                    ->relationship('obat', 'nama_obat')
                    ->searchable()
                    ->preload(),
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => ListKartuStoks::route('/'),
        ];
    }
}
