<?php

namespace App\Filament\Resources\Dokters;

use BackedEnum;
use App\Models\Dokter;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Actions\EditAction;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\Dokters\Pages\EditDokter;
use App\Filament\Resources\Dokters\Pages\ListDokters;
use App\Filament\Resources\Dokters\Pages\CreateDokter;
use App\Filament\Resources\Dokters\Schemas\DokterForm;
use App\Filament\Resources\Dokters\Tables\DoktersTable;

class DokterResource extends Resource
{
    protected static ?string $model = Dokter::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Dokter';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_dokter')->required(),
                TextInput::make('no_str')->label('No. STR'),
                TextInput::make('no_telp')->label('No. Telepon'),
                TextInput::make('alamat')->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_dokter')->searchable(),
                TextColumn::make('no_str')->label('No. STR'),
                TextColumn::make('no_telp')->label('No. Telepon'),
                TextColumn::make('created_at')->date(),
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
            'index' => ListDokters::route('/'),
            'create' => CreateDokter::route('/create'),
            'edit' => EditDokter::route('/{record}/edit'),
        ];
    }
}