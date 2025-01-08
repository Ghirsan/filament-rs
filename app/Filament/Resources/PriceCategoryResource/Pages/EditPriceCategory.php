<?php

namespace App\Filament\Resources\PriceCategoryResource\Pages;

use App\Filament\Resources\PriceCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPriceCategory extends EditRecord
{
    protected static string $resource = PriceCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
