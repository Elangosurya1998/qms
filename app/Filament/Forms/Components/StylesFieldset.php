<?php

namespace App\Filament\Forms\Components;

use Awcodes\Palette\Forms\Components\ColorPicker;
use Filament\Forms\Components;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Get;
use Illuminate\Contracts\Support\Htmlable;

class StylesFieldset extends Fieldset
{
    public static function make(Htmlable|\Closure|string|null $label = null): static
    {
        return parent::make($label)
            ->schema([

                ColorPicker::make('background_color')
                    ->label('Background Color')
                    ->colors([
                        'Warm Neutral 1' => '#B7B4AB',
                        'Warm Neutral 2' => '#615E56',
                        'Cream' => '#FDFCF6',
                        'Sand' => '#EFEEE9',
                        'Medium Gray' => '#D2D1CC',
                    ])
                    ->size('sm')
                    ->nullable(),

                Components\Select::make('padding')
                    ->label('Padding')
                    ->options([
                        'regular' => 'Regular',
                        'thick' => 'Thick',
                        'custom' => 'Custom',
                    ])
                    ->default('regular')
                    ->live()
                    ->helperText('Select padding type for the module'),

                Components\Fieldset::make('custom_padding')
                    ->label('Custom Padding')
                    ->visible(fn (Get $get) => $get('padding') === 'custom')
                    ->columns(2)
                    ->schema([
                        Components\TextInput::make('padding_top')
                            ->label('Top')
                            ->placeholder('e.g., 20px, 2rem, 50%, 10vw')
                            ->required(fn (Get $get) => $get('padding') === 'custom')
                            ->regex('/^\d+(px|rem|em|%|vh|vw)$/i')
                            ->validationAttribute('Padding Top'),

                        Components\TextInput::make('padding_bottom')
                            ->label('Bottom')
                            ->placeholder('e.g., 20px, 2rem, 50%, 10vw')
                            ->required(fn (Get $get) => $get('padding') === 'custom')
                            ->regex('/^\d+(px|rem|em|%|vh|vw)$/i')
                            ->validationAttribute('Padding Bottom'),
                    ]),
            ]);
    }
}
