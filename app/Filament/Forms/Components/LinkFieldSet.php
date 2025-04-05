<?php

namespace App\Filament\Forms\Components;

use Filament\Forms\Components;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Illuminate\Contracts\Support\Htmlable;

class LinkFieldSet extends Fieldset
{
    public static function make(Htmlable|\Closure|string|null $label = null): static
    {
        return parent::make($label)
            ->label('Link')
            ->schema([
                TextInput::make('label')
                    ->label('Label')
                    ->required()
                    ->maxLength(100),

                TextInput::make('url')
                    ->label('URL')
                    ->required()
                    ->placeholder('https://example.com'),

                Components\Select::make('target')
                    ->label('Target')
                    ->live()
                    ->options([
                        '_self' => 'Same Tab',
                        '_blank' => 'New Tab',
                    ])
                    ->default('_self')
                    ->native(false),

                Select::make('style')
                    ->label('Style')
                    ->options([
                        'default' => 'Default',
                        'outline' => 'Outline',
                    ])
                    ->default('default')
                    ->required()
                    ->native(false),
            ])
            ->columns(4)
            ->columnSpanFull();
    }
}
