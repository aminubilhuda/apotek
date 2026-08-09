<?php

namespace App\Filament\Resources\TransaksiPenjualans\Tables;

use App\Models\User;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class TransaksiPenjualansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                SelectFilter::make('id_user')
                    ->label('Siswa')
                    ->visible(fn (): bool => auth()->user()?->isAdmin() ?? false)
                    ->options(fn () => User::where('role', 'siswa')->pluck('name', 'id')),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
