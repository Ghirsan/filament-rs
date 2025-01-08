<?php

namespace App\Filament\Resources\AgeCategoryResource\Pages;

use App\Filament\Resources\AgeCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateAgeCategory extends CreateRecord
{
    protected static string $resource = AgeCategoryResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_by_id'] = Auth::id();
        $data['updated_by_id'] = Auth::id();

        return $data;
    }
}
