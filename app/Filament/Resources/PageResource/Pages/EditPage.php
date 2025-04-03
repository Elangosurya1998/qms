<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPage extends EditRecord
{
    protected static string $resource = PageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('preview')
                ->icon('heroicon-o-globe-alt')
                ->label('Preview')
                ->url(fn () => url('preview/page/'.$this->record?->slug))
                ->openUrlInNewTab(),

            Actions\DeleteAction::make(),
        ];
    }

    /**
     * Generate the preview URL for the current record.
     *
     * @return string
     */
    protected function getPreviewUrl(): string
    {
        $slug = $this->record->slug;

        return url($slug);
    }

}
