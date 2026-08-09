<?php

namespace App\Filament\Resources\Obats\RelationManagers;

use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class KartuStokRelationManager extends RelationManager
{
    protected static string $relationship = 'kartuStok';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('keterangan')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('keterangan')
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jenis')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'masuk' => 'success',
                        'keluar' => 'danger',
                        'penyesuaian' => 'warning',
                    }),
                Tables\Columns\TextColumn::make('jumlah')
                    ->numeric(),
                Tables\Columns\TextColumn::make('stok_awal')
                    ->numeric()
                    ->color('gray'),
                Tables\Columns\TextColumn::make('stok_akhir')
                    ->numeric()
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('keterangan')
                    ->wrap(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('User'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(), // Disable creation from here for now
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
