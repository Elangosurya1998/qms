<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Builder;

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
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\Select::make('menu_id')
                                    ->relationship('menu', 'name'),
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
                            ->columnSpanFull()
                            ->schema([
                                Forms\Components\Select::make('hero.type')
                                ->label('Type')
                                    ->options([
                                        'image' => 'Image',
                                        'video' => 'Video',
                                    ])
                                    ->columnSpanFull()
                                    ->live()
                                    ->afterStateUpdated(fn (Select $component) => $component
                                        ->getContainer()
                                        ->getComponent('dynamicTypeFields')
                                        ->getChildComponentContainer()
                                        ->fill()),

                                Grid::make(2)
                                    ->schema(fn (Get $get): array => match ($get('hero.type')) {
                                        'image' => [
                                            Forms\Components\FileUpload::make('hero.file')
                                                ->directory('uploads/pages/hero')
                                                ->preserveFilenames()
                                                ->acceptedFileTypes(['image/*'])
                                                ->label('Hero File')
                                                ->required()
                                                ->openable(),
                                            Forms\Components\Textarea::make('hero.caption')
                                                ->label('Hero Caption')
                                                ->placeholder('Enter hero caption text...')
                                                ->hidden(fn (callable $get) => $get('hero.type') === null),
                                        ],
                                        'video' => [
                                            Forms\Components\TextInput::make('hero.videoBannerTitle')
                                                ->label('Banner Title')
                                                ->required()
                                                ->maxLength(55),

                                            Forms\Components\TextInput::make('hero.videoBannerParagraph')
                                                ->required()
                                                ->maxLength(55)
                                                ->label('Banner Paragraph'),

                                            Forms\Components\FileUpload::make('hero.videoPoster')
                                                ->label('Poster')
                                                ->directory('uploads/pages/hero')
                                                ->required()
                                                ->openable()
                                                ->acceptedFileTypes(['image/*'])
                                                ->preserveFilenames(),
                                            Forms\Components\FileUpload::make('hero.videoFile')
                                                ->directory('uploads/pages/hero')
                                                ->preserveFilenames()
                                                ->acceptedFileTypes(['image/*', 'video/*'])
                                                ->label('Video')
                                                ->required()
                                                ->openable(),
                                            Forms\Components\Textarea::make('hero.caption')
                                                ->label('Caption')
                                                ->placeholder('Enter hero caption text...')
                                                ->columnSpanFull(),
                                        ],
                                        default => [],
                                    })
                                    ->key('dynamicTypeFields')
                            ]),

                        Forms\Components\Tabs\Tab::make('Content')
                            ->schema([
                                Forms\Components\Builder::make('content.modules')
                                    ->label('Modules')
                                    ->collapsible(true)
                                    ->blocks([

                                        Builder\Block::make('interactive_grid')
                                            ->label('Interactive Grid')
                                            ->schema([
                                                Forms\Components\TextInput::make('title')
                                                    ->label('Section Title')
                                                    ->default('Where will you venture to?')
                                                    ->required(),
                                                Forms\Components\Repeater::make('columns')
                                                    ->label('Columns')
                                                    ->columns(3)
                                                    ->schema([
                                                        Forms\Components\TextInput::make('title')
                                                            ->label('Column Title')
                                                            ->required(),
                                                        Forms\Components\TextInput::make('link')
                                                            ->label('Column Link')
                                                            ->required(),
                                                        Forms\Components\FileUpload::make('image')
                                                            ->label('Column Image')
                                                            ->directory('uploads/pages/columns')
                                                            ->preserveFilenames()
                                                            ->image()
                                                            ->required(),
                                                    ])
                                                    ->minItems(1)
                                                    ->maxItems(3),
                                            ]),

                                        Builder\Block::make('split_content_section')
                                            ->label('Split Content Section')
                                            ->columns(2)
                                            ->schema([

                                                TextInput::make('head')
                                                    ->label('Head')
                                                    ->maxLength(255),

                                                TextInput::make('title')
                                                    ->label('Title')
                                                    ->required(),

                                                TextInput::make('button1')
                                                    ->label('Button 1 Text')
                                                    ->maxLength(255),

                                                TextInput::make('button1Link')
                                                    ->label('Button 1 Link')
                                                    ->url()
                                                    ->nullable(),

                                                TextInput::make('button2')
                                                    ->label('Button 2 Text')
                                                    ->maxLength(255),

                                                TextInput::make('button2Link')
                                                    ->label('Button 2 Link')
                                                    ->url()
                                                    ->nullable(),

                                                Textarea::make('paragraph')
                                                    ->label('Paragraph')
                                                    ->rows(4)
                                                    ->required(),

                                                FileUpload::make('image')
                                                    ->label('Image')
                                                    ->directory('uploads/pages/split-content')
                                                    ->preserveFilenames()
                                                    ->acceptedFileTypes(['image/*'])
                                                    ->openable()
                                                    ->required(),
                                            ])


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
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('menu.name')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\ImageColumn::make('feature_image')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('author')
                    ->searchable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
                Tables\Columns\TextColumn::make('order_by')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
