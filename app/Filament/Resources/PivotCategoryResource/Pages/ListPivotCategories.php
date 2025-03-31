<?php

namespace App\Filament\Resources\PivotCategoryResource\Pages;

use App\Filament\Resources\PivotCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPivotCategories extends ListRecords
{
    protected static string $resource = PivotCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
