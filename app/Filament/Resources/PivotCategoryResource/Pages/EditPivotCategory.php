<?php

namespace App\Filament\Resources\PivotCategoryResource\Pages;

use App\Filament\Resources\PivotCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPivotCategory extends EditRecord
{
    protected static string $resource = PivotCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
