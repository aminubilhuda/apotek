<?php

namespace App\Filament\Resources\TransaksiPenjualans\Pages;

use App\Filament\Resources\TransaksiPenjualans\TransaksiPenjualanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTransaksiPenjualan extends EditRecord
{
    protected static string $resource = TransaksiPenjualanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('cetakNota')
                ->label('Cetak Nota')
                ->icon('heroicon-o-printer')
                ->url(fn ($record) => route('transaksi.cetak-nota', $record))
                ->openUrlInNewTab(),
            Actions\DeleteAction::make(),
        ];
    }
}
