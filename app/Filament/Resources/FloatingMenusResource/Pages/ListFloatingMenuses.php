<?php

namespace App\Filament\Resources\FloatingMenusResource\Pages;

use App\Filament\Resources\FloatingMenusResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFloatingMenuses extends ListRecords
{
    protected static string $resource = FloatingMenusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
