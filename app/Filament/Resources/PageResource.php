<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'CMS';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Page Details')
                    ->columnSpanFull()
                    ->columns(2)
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Basic Information')
                            ->schema([
                                Forms\Components\Select::make('menu_id')
                                    ->relationship('menu', 'name'),
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\FileUpload::make('feature_image')
                                    ->directory('file-manager/page/feature_image')
                                    ->preserveFilenames()
                                    ->maxSize(1024 * 2)
                                    ->openable()
                                    ->columnSpanFull()
                                    ->image(),
                                Forms\Components\Textarea::make('excerpt')
                                    ->columnSpanFull(),
                            ]),

                        Forms\Components\Tabs\Tab::make('Hero')
                            ->schema([
                                Forms\Components\FileUpload::make('content.hero')
                                    ->disk(config('media-library.disk_name'))
                                    ->directory('pages')
                                    ->acceptedFileTypes(['image/*', 'video/*'])
                                    ->preserveFilenames()
                                    ->columnSpanFull(),

                                Forms\Components\RichEditor::make('content.hero_caption')
                                    ->label('Hero Caption')
                                    ->placeholder('Enter hero caption text here...'),
                            ]),

                        Forms\Components\Tabs\Tab::make('Content')
                            ->schema([
                                Forms\Components\Builder::make('content.modules')
                                    ->label('Modules')
                                    ->blocks([
                                        Forms\Components\Builder\Block::make('tagline')
                                            ->label('Tagline')
                                            ->schema([
                                                Forms\Components\Tabs::make('ModuleTabs')
                                                    ->tabs([
                                                        Forms\Components\Tabs\Tab::make('Content')
                                                            ->schema([
                                                                Forms\Components\Textarea::make('content')
                                                                    ->label('Tagline Content')
                                                                    ->required()
                                                                    ->columnSpanFull(),
                                                            ]),
                                                    ]),
                                            ]),
                                    ])
                                    ->columnSpanFull(),
                            ]),

                        Forms\Components\Tabs\Tab::make('Settings')
                            ->schema([
                                Forms\Components\TextInput::make('author')
                                    ->default(auth()->user()->name)
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('order_by')
                                    ->numeric(),

                                Forms\Components\Toggle::make('is_published')
                                    ->label('Publish')
                                    ->live()
                                    ->inline(false)
                                    ->default(true),

                                Forms\Components\Toggle::make('status')
                                    ->inline(false)
                                    ->required(),

                                Forms\Components\DatePicker::make('publish_date')
                                    ->label('Publish Date')
                                    ->visible(fn (callable $get) => $get('is_published'))
                                    ->required()
                                    ->default(now())
                                    ->helperText('Select the date when the menu will be published.'),

                                Forms\Components\TimePicker::make('publish_time')
                                    ->label('Publish Time')
                                    ->visible(fn (callable $get) => $get('is_published'))
                                    ->required()
                                    ->default(now())
                                    ->helperText('Select the time when the menu will be published.'),

                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('menu.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('feature_image'),
                Tables\Columns\TextColumn::make('author')
                    ->searchable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
                Tables\Columns\TextColumn::make('order_by')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('publish_date')
                    ->date()
                    ->sortable(),
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
                Tables\Actions\EditAction::make(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
