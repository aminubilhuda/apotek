<?php

namespace App\Filament\Widgets;

use App\Models\TransaksiPenjualan;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;

class TransaksiTerbaruWidget extends TableWidget
{
    protected static ?int $sort = 6;

    protected int|string|array $columnSpan = 6;

    protected function getTableHeading(): string
    {
        return 'Transaksi Penjualan Terbaru';
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(TransaksiPenjualan::query()->latest('tanggal_transaksi')->limit(6))
            ->columns([
                TextColumn::make('tanggal_transaksi')
                    ->label('Tanggal')
                    ->dateTime('d/m/Y H:i'),
                TextColumn::make('pelanggan.nama_pelanggan')
                    ->label('Pelanggan')
                    ->placeholder('Umum'),
                TextColumn::make('metode_pembayaran')
                    ->label('Metode')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Tunai' => 'warning',
                        'Transfer' => 'info',
                        'QRIS' => 'success',
                        default => 'gray',
                    }),
                TextColumn::make('total_harga')
                    ->label('Total')
                    ->formatStateUsing(fn (float $state) => 'Rp'.number_format($state, 0, ',', '.')),
            ])
            ->paginated(false);
    }
}
