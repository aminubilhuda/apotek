<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengaturanResource\Pages;
use App\Models\Pengaturan;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Validation\Rules\Unique;

class PengaturanResource extends Resource
{
    protected static ?string $model = Pengaturan::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-cog';

    protected static ?string $navigationLabel = 'Pengaturan';

    protected static ?string $pluralModelLabel = 'Pengaturan';

    protected static ?string $modelLabel = 'Pengaturan';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('key')
                    ->label('Kunci')
                    ->required()
                    ->unique(modifyRuleUsing: function (Unique $rule) {
                        $user = auth()->user();

                        if ($user === null || $user->isAdmin()) {
                            return $rule;
                        }

                        return $rule->where('id_user', $user->id);
                    })
                    ->maxLength(255),
                Forms\Components\Textarea::make('value')
                    ->label('Nilai')
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('key')
                    ->label('Kunci')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('value')
                    ->label('Nilai')
                    ->limit(50),
                TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime('d/m/Y H:i:s')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Diperbarui Pada')
                    ->dateTime('d/m/Y H:i:s')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
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
            'index' => Pages\ManagePengaturans::route('/'),
        ];
    }
}
