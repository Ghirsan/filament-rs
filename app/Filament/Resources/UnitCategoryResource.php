<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UnitCategoryResource\Pages;
use App\Filament\Resources\UnitCategoryResource\RelationManagers;
use App\Models\UnitCategory;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UnitCategoryResource extends Resource
{
    protected static ?string $model = UnitCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(255),
                Toggle::make('is_active')
                    ->onIcon('heroicon-m-check')
                    ->offIcon('heroicon-m-x-mark')
                    ->inline(false)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                IconColumn::make('is_active')
                    ->icon(fn ($state): string => match ($state) {
                        'draft' => 'heroicon-o-information-circle',
                        0 => 'heroicon-o-x-circle',
                        1 => 'heroicon-o-check-circle',
                        default => 'heroicon-o-question-mark-circle',
                    })
                    ->color(fn ($state): string => match ((int) $state) {
                        0 => 'danger', // Merah
                        1 => 'success', // Hijau
                        default => 'secondary',
                    }),
                TextColumn::make('updated_at')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListUnitCategories::route('/'),
            'create' => Pages\CreateUnitCategory::route('/create'),
            'edit' => Pages\EditUnitCategory::route('/{record}/edit'),
        ];
    }
}
