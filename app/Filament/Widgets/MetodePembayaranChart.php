<?php

namespace App\Filament\Widgets;

use App\Models\TransaksiPenjualan;
use Filament\Widgets\DoughnutChartWidget;

class MetodePembayaranChart extends DoughnutChartWidget
{
    protected static ?int $sort = 3;

    protected int|string|array $columnSpan = 6;

    protected ?string $maxHeight = '280px';

    protected function getData(): array
    {
        $tunai = TransaksiPenjualan::query()->where('metode_pembayaran', 'Tunai')->count();
        $transfer = TransaksiPenjualan::query()->where('metode_pembayaran', 'Transfer')->count();
        $qris = TransaksiPenjualan::query()->where('metode_pembayaran', 'QRIS')->count();

        return [
            'datasets' => [
                [
                    'data' => [$tunai, $transfer, $qris],
                    'backgroundColor' => ['rgb(245, 158, 11)', 'rgb(59, 130, 246)', 'rgb(16, 185, 129)'],
                    'borderColor' => 'rgb(255, 255, 255)',
                    'borderWidth' => 2,
                ],
            ],
            'labels' => ['Tunai ('.$tunai.')', 'Transfer ('.$transfer.')', 'QRIS ('.$qris.')'],
        ];
    }

    public function getHeading(): string
    {
        return 'Distribusi Metode Pembayaran';
    }
}
