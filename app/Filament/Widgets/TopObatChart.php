<?php

namespace App\Filament\Widgets;

use App\Models\DetailTransaksi;
use Filament\Widgets\BarChartWidget;

class TopObatChart extends BarChartWidget
{
    protected static ?int $sort = 4;

    protected int|string|array $columnSpan = 6;

    protected ?string $maxHeight = '280px';

    protected function getData(): array
    {
        $terlaris = DetailTransaksi::query()
            ->with('obat')
            ->whereHas('transaksi')
            ->whereHas('obat')
            ->get()
            ->groupBy('id_obat')
            ->map(fn ($items) => $items->sum('jumlah'))
            ->sortDesc()
            ->take(8);

        return [
            'datasets' => [
                [
                    'label' => 'Terjual (unit)',
                    'data' => array_values($terlaris->toArray()),
                    'backgroundColor' => 'rgb(16, 185, 129)',
                    'borderRadius' => 6,
                ],
            ],
            'labels' => $terlaris->keys()
                ->map(fn ($idObat) => str(DetailTransaksi::query()->find($idObat)?->obat?->nama_obat ?? 'Obat #'.$idObat)->limit(18))
                ->values()
                ->toArray(),
        ];
    }

    public function getHeading(): string
    {
        return 'Obat Terlaris — Top 8';
    }
}
