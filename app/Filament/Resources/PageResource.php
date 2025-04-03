<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Menus;
use App\Models\Page;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
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

                                                Repeater::make('buttons')
                                                    ->label('Buttons')
                                                    ->columns(3)
                                                    ->columnSpanFull()
                                                    ->createItemButtonLabel('Add Button')
                                                    ->schema([
                                                        TextInput::make('label')
                                                            ->label('Button Label')
                                                            ->required()
                                                            ->maxLength(100),

                                                        TextInput::make('url')
                                                            ->label('Button URL')
                                                            ->required()
                                                            ->placeholder('https://example.com')
                                                            ->url(),

                                                        Select::make('style')
                                                            ->label('Button Style')
                                                            ->options([
                                                                'default' => 'Default',
                                                                'outline' => 'Outline',
                                                            ])
                                                            ->default('primary')
                                                            ->required(),
                                                    ])
                                                    ->minItems(1)
                                                    ->maxItems(3)
                                                    ->reorderable(),
                                            ]),

                                        Builder\Block::make('tabbed_interface')
                                            ->label('Tabbed Interface')
                                            ->schema([
                                                TextInput::make('title')
                                                    ->label('Tabbed Section Title')
                                                    ->required()
                                                    ->maxLength(255),

                                                Repeater::make('tabs')
                                                    ->label('Tabs')
                                                    ->schema([
                                                        TextInput::make('title')
                                                            ->label('Tab Title')
                                                            ->required()
                                                            ->maxLength(255),

                                                        Repeater::make('statistics')
                                                            ->label('Statistics')
                                                            ->columns(3)
                                                            ->schema([
                                                                TextInput::make('value')
                                                                    ->label('Statistic Value')
                                                                    ->required()
                                                                    ->maxLength(50),

                                                                TextInput::make('symbol')
                                                                    ->label('Statistic Symbol')
                                                                    ->maxLength(10),

                                                                Textarea::make('description')
                                                                    ->label('Statistic Description')
                                                                    ->rows(2)
                                                                    ->required(),
                                                            ])
                                                            ->minItems(1)
                                                            ->createItemButtonLabel('Add Statistic'),
                                                    ])
                                                    ->minItems(1)
                                                    ->maxItems(3)
                                                    ->createItemButtonLabel('Add Tab')
                                                    ->collapsible(),
                                            ]),

                                        Builder\Block::make('highlight_with_buttons')
                                            ->label('Highlight with Buttons')
                                            ->schema([

                                                TextInput::make('title')
                                                    ->label('Title')
                                                    ->required()
                                                    ->maxLength(255),

                                                FileUpload::make('backgroundImage')
                                                    ->label('Background Image')
                                                    ->directory('uploads/pages/highlight-with-buttons')
                                                    ->preserveFilenames()
                                                    ->acceptedFileTypes(['image/*'])
                                                    ->openable(),

                                                Repeater::make('buttons')
                                                    ->label('Buttons')
                                                    ->columns(3)
                                                    ->createItemButtonLabel('Add Button')
                                                    ->schema([
                                                        TextInput::make('label')
                                                            ->label('Button Label')
                                                            ->required()
                                                            ->maxLength(100),

                                                        TextInput::make('url')
                                                            ->label('Button URL')
                                                            ->required()
                                                            ->placeholder('https://example.com')
                                                            ->url(),

                                                        Select::make('style')
                                                            ->label('Button Style')
                                                            ->options([
                                                                'default' => 'Default',
                                                                'outline' => 'Outline',
                                                            ])
                                                            ->default('primary')
                                                            ->required(),
                                                    ])
                                                    ->minItems(1)
                                                    ->maxItems(3)
                                                    ->reorderable(),

                                            ]),

                                        Builder\Block::make('image_with_text_carousel')
                                            ->label('Image with Text Carousel')
                                            ->schema([

                                                FileUpload::make('backgroundImage')
                                                    ->label('Background Image')
                                                    ->directory('uploads/pages/image-with-text-carousel/background-image')
                                                    ->preserveFilenames()
                                                    ->acceptedFileTypes(['image/*'])
                                                    ->openable(),

                                                Repeater::make('carouselItems')
                                                    ->label('Carousel Items')
                                                    ->columns(3)
                                                    ->createItemButtonLabel('Add Carousel')
                                                    ->schema([
                                                        Textarea::make('content')
                                                            ->label('Content')
                                                            ->maxLength(400)
                                                            ->rows(10)
                                                            ->required(),

                                                        FileUpload::make('image')
                                                            ->label('Image')
                                                            ->directory('uploads/pages/image-with-text-carousel')
                                                            ->preserveFilenames()
                                                            ->acceptedFileTypes(['image/*'])
                                                            ->required()
                                                            ->openable(),

                                                        TextInput::make('author')
                                                            ->label('Author')
                                                            ->maxLength(155)
                                                            ->required(),
                                                    ])
                                                    ->minItems(1)
                                                    ->maxItems(3)
                                                    ->reorderable(),

                                            ]),

                                        Builder\Block::make('title_with_content')
                                            ->label('Title with Content')
                                            ->schema([

                                                FileUpload::make('backgroundImage')
                                                    ->label('Background Image')
                                                    ->directory('uploads/pages/image-with-text-carousel/background-image')
                                                    ->preserveFilenames()
                                                    ->acceptedFileTypes(['image/*'])
                                                    ->openable(),

                                                TextInput::make('title')
                                                    ->label('Title')
                                                    ->maxLength(100)
                                                    ->required(),

                                                Textarea::make('content')
                                                    ->label('Content')
                                                    ->rows(4)
                                                    ->required(),
                                            ]),

                                    ])
                                    ->columnSpanFull(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Quick Menu')
                            ->schema([
                                Forms\Components\Toggle::make('quick_menu_enabled')
                                    ->label('Enable Quick Menu')
                                    ->live()
                                    ->inline(false)
                                    ->default(false),

                                Forms\Components\Select::make('quick_menu_position')
                                    ->label('Position')
                                    ->options([
                                        'top' => 'Top',
                                        'bottom' => 'Bottom',
                                    ])
                                    ->default('bottom')
                                    ->hint('Select where you want to display the Quick Menu')
                                    ->hidden(fn (Get $get) => !$get('quick_menu_enabled')),

                                TextInput::make('quick_menus.title')
                                    ->label('Quick Menu Title')
                                    ->placeholder('Enter the Quick Menu title...')
                                    ->hidden(fn (Get $get) => !$get('quick_menu_enabled'))
                                    ->maxLength(55)
                                    ->required(),

                                TextInput::make('quick_menus.blockContents')
                                    ->label('Block Contents')
                                    ->placeholder('Enter the main content block text...')
                                    ->hidden(fn (Get $get) => !$get('quick_menu_enabled'))
                                    ->maxLength(255)
                                    ->required(),

                                Forms\Components\Select::make('quick_menus.linkItems')
                                    ->options(function () {
                                        // Fetch pages with prefixed key
                                        $pages = Page::all()->mapWithKeys(function ($page) {
                                            return [ $page->slug.':'.$page->title => $page->title];
                                        })->toArray();

                                        // Fetch posts with prefixed key
                                        $posts = Post::all()->mapWithKeys(function ($post) {
                                            return ['post/' . $post->slug .':'. $post->title => $post->title];
                                        })->toArray();

                                        return [
                                            'Pages' => $pages,
                                            'Posts' => $posts,
                                        ];
                                    })
                                    ->label('Quick Menus')
                                    ->hidden(fn (Get $get) => !$get('quick_menu_enabled'))
                                    ->multiple()
                                    ->preload()
                                    ->searchable()
                                    ->native(false),

                                FileUpload::make('quick_menus.backgroundImage')
                                    ->label('Background Image')
                                    ->directory('uploads/background-images')
                                    ->preserveFilenames()
                                    ->maxSize(2048)
                                    ->acceptedFileTypes(['image/*'])
                                    ->hidden(fn (Get $get) => !$get('quick_menu_enabled')),

                            ]),
                        Forms\Components\Tabs\Tab::make('Settings')
                            ->schema([
                                Forms\Components\TextInput::make('author')
                                    ->default(auth()->user()?->name)
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
