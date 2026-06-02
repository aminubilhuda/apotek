<?php

namespace App\Filament\Resources\Pelanggans;

use BackedEnum;
use App\Models\Pelanggan;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Actions\EditAction;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Filament\Actions\BulkActionGroup;
use Filament\Forms\Components\Select;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use App\Filament\Resources\Pelanggans\Pages\EditPelanggan;
use App\Filament\Resources\Pelanggans\Pages\ListPelanggans;
use App\Filament\Resources\Pelanggans\Pages\CreatePelanggan;
use App\Filament\Resources\Pelanggans\Schemas\PelangganForm;
use App\Filament\Resources\Pelanggans\Tables\PelanggansTable;

class PelangganResource extends Resource
{
    protected static ?string $model = Pelanggan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Pelanggan';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_pelanggan')->required(),
                TextInput::make('alamat')->nullable(),
                TextInput::make('no_telp')->label('No. Telepon'),
                Select::make('jenis_kelamin')
                    ->options([
                        'L' => 'Laki-laki',
                        'P' => 'Perempuan',
                    ]),
                DatePicker::make('tanggal_lahir'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_pelanggan')->searchable(),
                TextColumn::make('no_telp')->label('No. Telepon'),
                TextColumn::make('jenis_kelamin')
                    ->formatStateUsing(fn (string $state): string => 
                        match ($state) {
                            'L' => 'Laki-laki',
                            'P' => 'Perempuan',
                            default => $state,
                        }),
                TextColumn::make('tanggal_lahir')->date(),
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
            'index' => ListPelanggans::route('/'),
            'create' => CreatePelanggan::route('/create'),
            'edit' => EditPelanggan::route('/{record}/edit'),
        ];
    }
}