<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PriceCategoryResource\Pages;
use App\Filament\Resources\PriceCategoryResource\RelationManagers;
use App\Models\PriceCategory;
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

class PriceCategoryResource extends Resource
{
    protected static ?string $model = PriceCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->columnSpanFull()
                    ->placeholder('disabled')
                    ->disabled(),
                TextInput::make('min')
                    ->required()
                    ->numeric()
                    ->minValue(0),
                TextInput::make('max')
                    ->required()
                    ->numeric()
                    ->minValue(0),
                Toggle::make('is_active')
                    ->default(false)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('min'),
                TextColumn::make('max'),
                IconColumn::make('is_active')
                    ->icon(fn ($state): string => match ($state) {
                        'draft' => 'heroicon-o-information-circle',
                        0 => 'heroicon-o-x-circle',
                        1 => 'heroicon-o-check-circle',
                        default => 'heroicon-o-question-mark-circle',
                    })
                    ->color(fn ($state): string => match ($state) {
                        'draft' => 'info',
                        0 => 'danger',
                        1 => 'success',
                        default => 'secondary',
                    })
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
            'index' => Pages\ListPriceCategories::route('/'),
            'create' => Pages\CreatePriceCategory::route('/create'),
            'edit' => Pages\EditPriceCategory::route('/{record}/edit'),
        ];
    }

}
