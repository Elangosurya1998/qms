<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('preview')
                ->icon('heroicon-o-globe-alt')
                ->label('Preview')
                ->url(fn () => url('preview/post/'.$this->record?->slug))
                ->openUrlInNewTab(),
            Actions\DeleteAction::make(),
        ];
    }
}
