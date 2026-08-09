<?php

namespace App\Filament\Resources\Reseps;

use App\Filament\Resources\Reseps\Pages\CreateResep;
use App\Filament\Resources\Reseps\Pages\EditResep;
use App\Filament\Resources\Reseps\Pages\ListReseps;
use App\Models\Resep;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ResepResource extends Resource
{
    protected static ?string $model = Resep::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Resep';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('id_dokter')
                    ->label('Dokter')
                    ->relationship('dokter', 'nama_dokter')
                    ->preload()
                    ->required(),
                Select::make('id_pelanggan')
                    ->label('Pelanggan')
                    ->relationship('pelanggan', 'nama_pelanggan')
                    ->preload()
                    ->required(),
                DatePicker::make('tanggal_resep')
                    ->required(),
                TextInput::make('catatan')
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('dokter.nama_dokter')
                    ->label('Dokter')
                    ->searchable(),
                TextColumn::make('pelanggan.nama_pelanggan')
                    ->label('Pelanggan')
                    ->searchable(),
                TextColumn::make('tanggal_resep')
                    ->date()
                    ->sortable(),
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
            'index' => ListReseps::route('/'),
            'create' => CreateResep::route('/create'),
            'edit' => EditResep::route('/{record}/edit'),
        ];
    }
}
