<?php

namespace App\Filament\Resources\FloatingMenusResource\Pages;

use App\Filament\Resources\FloatingMenusResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFloatingMenus extends EditRecord
{
    protected static string $resource = FloatingMenusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
