<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PromoResource\Pages;
use App\Filament\Resources\PromoResource\RelationManagers;
use App\Models\Promo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PromoResource extends Resource
{
    protected static ?string $model = Promo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Name')
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->label('Description'),
                Forms\Components\Toggle::make('is_active')
                    ->label('Is Active'),
                Forms\Components\DateTimePicker::make('published_at')
                    ->label('Published At'),
                Forms\Components\DateTimePicker::make('expired_at')
                    ->label('Expired At'),
                Forms\Components\TextInput::make('price')
                    ->label('Price')
                    ->money('idr'),
                Forms\Components\Toggle::make('show_price')
                    ->label('Show Price'),
                Forms\Components\Select::make('age_category_id')
                    ->label('Age Category')
                    ->relationship('ageCategory', 'name'),
                Forms\Components\Select::make('price_category_id')
                    ->label('Price Category')
                    ->relationship('priceCategory', 'name'),
                Forms\Components\Select::make('unit_category_id')
                    ->label('Unit Category')
                    ->relationship('unitCategory', 'name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListPromos::route('/'),
            'create' => Pages\CreatePromo::route('/create'),
            'edit' => Pages\EditPromo::route('/{record}/edit'),
        ];
    }
}
