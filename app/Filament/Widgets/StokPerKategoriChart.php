<?php

namespace App\Filament\Widgets;

use App\Models\Obat;
use Filament\Widgets\DoughnutChartWidget;

class StokPerKategoriChart extends DoughnutChartWidget
{
    protected static ?int $sort = 5;

    protected int|string|array $columnSpan = 6;

    protected ?string $maxHeight = '280px';

    protected function getData(): array
    {
        $persediaan = Obat::query()->get()
            ->groupBy(fn (Obat $obat) => $obat->jenis_obat ?? $obat->kategori ?? 'Lainnya')
            ->map(fn ($items) => $items->sum('stok'))
            ->filter()
            ->sortDesc();

        $warna = ['rgb(59, 130, 246)', 'rgb(16, 185, 129)', 'rgb(245, 158, 11)', 'rgb(239, 68, 68)', 'rgb(139, 92, 246)', 'rgb(14, 165, 233)', 'rgb(236, 72, 153)', 'rgb(100, 116, 139)'];

        return [
            'datasets' => [
                [
                    'data' => array_values($persediaan->toArray()),
                    'backgroundColor' => array_slice($warna, 0, max(1, $persediaan->count())),
                    'borderColor' => 'rgb(255, 255, 255)',
                    'borderWidth' => 2,
                ],
            ],
            'labels' => $persediaan->keys()->map(fn (string $kategori) => str($kategori)->title())->toArray(),
        ];
    }

    public function getHeading(): string
    {
        return 'Stok per Kategori Obat';
    }
}
