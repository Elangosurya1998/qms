<?php

namespace App\Filament\Resources\MenusResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ChildrenRelationManager extends RelationManager
{
    protected static string $relationship = 'children';
    protected static ?string $title = 'Menu Children';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Menu Child Details') // Name of the Tabs container
                ->tabs([
                    Forms\Components\Tabs\Tab::make('General')
                        ->schema([
                            Forms\Components\TextInput::make('name')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\Hidden::make('type')
                                ->default('sub_menu')
                                ->required(),
                            Forms\Components\Toggle::make('status')
                                ->required(),
                        ]),

                    Forms\Components\Tabs\Tab::make('URL Options')
                        ->schema([
                            Forms\Components\Checkbox::make('is_url')
                                ->inline(false)
                                ->live(),
                            Forms\Components\TextInput::make('url')
                                ->hidden(fn(Get $get): bool => !$get('is_url'))
                                ->required(),
                            Forms\Components\Select::make('target')
                                ->hidden(fn(Get $get): bool => !$get('is_url'))
                                ->label('Link Target')
                                ->live()
                                ->options([
                                    '_self' => 'Same Tab',
                                    '_blank' => 'New Tab',
                                ])
                                ->native(false),
                        ]),
                ])
                ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\BooleanColumn::make('status'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
