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
                Forms\Components\FileUpload::make('image')
                    ->label('Image')
                    ->image(),
                Forms\Components\Toggle::make('is_active')
                    ->label('Is Active')
                    ->inline(false),
                Forms\Components\Textarea::make('description')
                    ->label('Description'),
                Forms\Components\DatePicker::make('published_at')
                    ->label('Published At'),
                Forms\Components\DatePicker::make('expired_at')
                    ->label('Expired At'),
                Forms\Components\TextInput::make('price')
                    ->label('Price')
                    ->numeric(),
                    // ->minValue()
                    // ->maxValue(),
                Forms\Components\Toggle::make('show_price')
                    ->label('Show Price'),
                Forms\Components\Radio::make('genders')
                    ->label('Gender?')
                    ->options([
                        'L' => 'Laki-Laki',
                        'P' => 'Perempuan',
                    ])
                    ->inline()
                    ->inlineLabel(false),
                Forms\Components\Select::make('age_category')
                    ->label('Age Category')
                    ->relationship('ageCategory', 'name')
                    ->required(),
                Forms\Components\Select::make('price_category')
                    ->label('Price Category')
                    ->relationship('priceCategory', 'name')
                    ->required(),
                Forms\Components\Select::make('unit_category')
                    ->label('Unit Category')
                    ->relationship('unitCategory', 'name')
                    ->required(),
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
