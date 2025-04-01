<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenusResource\Pages;
use App\Filament\Resources\MenusResource\RelationManagers;
use App\Models\Menus;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Get;
use Notification;

class MenusResource extends Resource
{
    protected static ?string $model = Menus::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Menus';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Menu Details') // Name of the Tabs container
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('General')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->unique(ignoreRecord: true)
                                    ->required()
                                    ->maxLength(255),

                                Forms\Components\Textarea::make('excerpt')
                                    ->label('Excerpt'),

                                Forms\Components\Hidden::make('type')
                                    ->default('main_menu')
                                    ->required(),

                                Forms\Components\FileUpload::make('image')
                                    ->image()
                                    ->directory('file-manager/menu/image')
                                    ->preserveFilenames()
                                    ->maxSize(1024 * 2)
                                    ->openable(),
                                Forms\Components\Toggle::make('status')
                                    ->required(),
                            ]),

                        Forms\Components\Tabs\Tab::make('Locations')
                            ->schema([

                                Forms\Components\CheckboxList::make('locations')
                                    ->options([
                                        'header' => 'Header Menu',
                                        'footer' => 'Footer Menu',
                                        'topbar' => 'Top bar Menu',
                                        'floating' => 'Floating Menu',
                                    ])
                                    ->descriptions([
                                        'header' => 'Will appear in the main navigation located in the header section of the website.',
                                        'footer' => 'Will appear in the footer menu, typically located at the bottom of the website.',
                                        'topbar' => 'Will be displayed in the topmost bar, often used for quick links or announcements.',
                                        'floating' => 'Will appear as a dynamic floating menu, commonly shown as an overlay or popup.',
                                    ])
                                    ->helperText('Note:
                                        • If "Topbar" is selected, the other options will be disabled.
                                        • If "Header" or "Footer" is selected, "Topbar" and "Floating" will be disabled.
                                        • Selecting "Floating" will disable all other options.')
                                    ->required()
                                    ->reactive(),

                                Forms\Components\Group::make()
                                    ->columns(2)
                                    ->schema([
                                        Forms\Components\DatePicker::make('publish_date')
                                            ->label('Publish Date')
                                            ->visible(fn (callable $get) => in_array('topbar', $get('locations')) || in_array('floating', $get('locations')))
                                            ->required(fn (callable $get) => in_array('topbar', $get('locations')) || in_array('floating', $get('locations')))
                                            ->default(now())
                                            ->helperText('Select the date when the menu will be published.'),
                                        Forms\Components\TimePicker::make('publish_time')
                                            ->label('Publish Time')
                                            ->visible(fn (callable $get) => in_array('topbar', $get('locations')) || in_array('floating', $get('locations')))
                                            ->required(fn (callable $get) => in_array('topbar', $get('locations')) || in_array('floating', $get('locations')))
                                            ->default(now())
                                            ->helperText('Select the time when the menu will be published.'),
                                    ])
                                    ->visible(fn (callable $get) => in_array('topbar', $get('locations')) || in_array('floating', $get('locations'))),

                            ]),

                        Forms\Components\Tabs\Tab::make('URL Options')
                            ->schema([
                                Forms\Components\Checkbox::make('is_url')
                                    ->inline(false)
                                    ->columnSpanFull()
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
                            ])
                            ->columns(2),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn (Builder $query): Builder => $query->whereNull('parent_id'))
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('locations')
                    ->badge()
                    ->searchable(),
                Tables\Columns\BooleanColumn::make('status'),
                Tables\Columns\TextColumn::make('order_by')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),

                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\ChildrenRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMenuses::route('/'),
            'create' => Pages\CreateMenus::route('/create'),
            'edit' => Pages\EditMenus::route('/{record}/edit'),
        ];
    }
}
