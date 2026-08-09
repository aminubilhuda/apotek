<?php

namespace App\Filament\Resources\Obats;

use App\Filament\Resources\Obats\Pages\CreateObat;
use App\Filament\Resources\Obats\Pages\EditObat;
use App\Filament\Resources\Obats\Pages\ListObats;
use App\Models\Obat;
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

class ObatResource extends Resource
{
    protected static ?string $model = Obat::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Obat';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kode_obat')->required(),
                TextInput::make('nama_obat')->required(),
                TextInput::make('jenis_obat'),
                TextInput::make('kategori'),
                TextInput::make('satuan'),
                TextInput::make('stok')->numeric()->default(0),
                TextInput::make('harga_beli')->numeric()->prefix('Rp '),
                TextInput::make('harga_jual')->numeric()->prefix('Rp '),
                DatePicker::make('tanggal_kadaluarsa'),
                Select::make('id_supplier')
                    ->label('Supplier')
                    ->relationship('supplier', 'nama_supplier')
                    ->preload()
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode_obat')->searchable(),
                TextColumn::make('nama_obat')->searchable(),
                TextColumn::make('stok')->sortable(),
                TextColumn::make('harga_jual')->money('IDR'),
                TextColumn::make('supplier.nama_supplier')->label('Supplier'),
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
            \App\Filament\Resources\Obats\RelationManagers\KartuStokRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListObats::route('/'),
            'create' => CreateObat::route('/create'),
            'edit' => EditObat::route('/{record}/edit'),
        ];
    }
}
