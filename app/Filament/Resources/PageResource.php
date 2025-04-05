<?php

namespace App\Filament\Resources;

use App\Filament\Forms\Components\LinkFieldSet;
use App\Filament\Forms\Components\StylesFieldset;
use App\Filament\Resources\PageResource\Pages;
use App\Models\Menus;
use App\Models\Page;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Builder;
use Illuminate\Support\Facades\Auth;

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
                                    ->label('Sections Builder')
                                    ->collapsible()
                                    ->collapsed(true)
                                    ->blocks([

                                        Builder\Block::make('interactive_grid')
                                            ->label('Interactive Grid')
                                            ->schema([
                                                Forms\Components\Tabs::make('Interactive Grid Details')
                                                    ->tabs([
                                                        Forms\Components\Tabs\Tab::make('Section Title')
                                                            ->label('Section Title')
                                                            ->schema([
                                                                Forms\Components\TextInput::make('title')
                                                                    ->label('Section Title')
                                                                    ->default('Where will you venture to?')
                                                                    ->required(),
                                                            ]),
                                                        Forms\Components\Tabs\Tab::make('Columns')
                                                            ->label('Columns')
                                                            ->schema([
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
                                                        Forms\Components\Tabs\Tab::make('Styles')
                                                            ->label('Styles')
                                                            ->schema([

                                                            ]),
                                                    ]),
                                            ]),

                                        Builder\Block::make('split_content_section')
                                            ->label('Split Content Section')
                                            ->schema([
                                                Forms\Components\Tabs::make('Split Content Details')
                                                    ->tabs([
                                                        Forms\Components\Tabs\Tab::make('Content Info')
                                                            ->label('Content Info')
                                                            ->schema([
                                                                TextInput::make('head')
                                                                    ->label('Head')
                                                                    ->maxLength(255),

                                                                TextInput::make('title')
                                                                    ->label('Title')
                                                                    ->required(),

                                                                RichEditor::make('paragraph')
                                                                    ->label('Paragraph')
                                                                    ->toolbarButtons([
                                                                        'link', 'bold', 'strike'
                                                                    ])
                                                                    ->required(),
                                                            ]),

                                                        Forms\Components\Tabs\Tab::make('Image')
                                                            ->label('Image')
                                                            ->schema([
                                                                FileUpload::make('image')
                                                                    ->label('Image')
                                                                    ->directory('uploads/pages/split-content')
                                                                    ->preserveFilenames()
                                                                    ->acceptedFileTypes(['image/*'])
                                                                    ->openable()
                                                                    ->required(),
                                                            ]),

                                                        Forms\Components\Tabs\Tab::make('Buttons')
                                                            ->label('Buttons')
                                                            ->schema([
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
                                                                            ->placeholder('https://example.com'),

                                                                        Select::make('style')
                                                                            ->label('Button Style')
                                                                            ->options([
                                                                                'default' => 'Default',
                                                                                'outline' => 'Outline',
                                                                            ])
                                                                            ->default('primary')
                                                                            ->required(),
                                                                    ])
                                                                    ->maxItems(3)
                                                                    ->reorderable(),
                                                            ]),
                                                    ]),
                                            ]),

                                        Builder\Block::make('tabbed_interface')
                                            ->label('Tabbed Interface')
                                            ->schema([
                                                Forms\Components\Tabs::make('Tabbed Interface Details')
                                                    ->tabs([
                                                        Forms\Components\Tabs\Tab::make('Section Info')
                                                            ->label('Section Info')
                                                            ->schema([
                                                                TextInput::make('title')
                                                                    ->label('Tabbed Section Title')
                                                                    ->required()
                                                                    ->maxLength(255),
                                                            ]),

                                                        Forms\Components\Tabs\Tab::make('Tabs')
                                                            ->label('Tabs')
                                                            ->schema([
                                                                Repeater::make('tabs')
                                                                    ->label('Tabs')
                                                                    ->schema([
                                                                        TextInput::make('title')
                                                                            ->label('Tab Title')
                                                                            ->required()
                                                                            ->maxLength(255),

                                                                        Forms\Components\Tabs::make('Tab Details')
                                                                            ->tabs([
                                                                                Forms\Components\Tabs\Tab::make('Statistics')
                                                                                    ->label('Statistics')
                                                                                    ->schema([
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
                                                                                    ]),
                                                                            ]),
                                                                    ])
                                                                    ->minItems(1)
                                                                    ->maxItems(3)
                                                                    ->createItemButtonLabel('Add Tab')
                                                                    ->collapsible(),
                                                            ]),
                                                    ]),
                                            ]),

                                        Builder\Block::make('highlight_with_buttons')
                                            ->label('Highlight with Buttons')
                                            ->schema([
                                                Forms\Components\Tabs::make('Highlight with Buttons Details')
                                                    ->tabs([
                                                        Forms\Components\Tabs\Tab::make('Content')
                                                            ->label('Content')
                                                            ->schema([
                                                                TextInput::make('title')
                                                                    ->label('Title')
                                                                    ->required()
                                                                    ->maxLength(255),
                                                            ]),

                                                        Forms\Components\Tabs\Tab::make('Background')
                                                            ->label('Background')
                                                            ->schema([
                                                                FileUpload::make('backgroundImage')
                                                                    ->label('Background Image')
                                                                    ->directory('uploads/pages/highlight-with-buttons')
                                                                    ->preserveFilenames()
                                                                    ->acceptedFileTypes(['image/*'])
                                                                    ->openable(),
                                                            ]),

                                                        Forms\Components\Tabs\Tab::make('Buttons')
                                                            ->label('Buttons')
                                                            ->schema([
                                                                Repeater::make('buttons')
                                                                    ->label('Buttons')
                                                                    ->columns(3)
                                                                    ->createItemButtonLabel('Add Button')
                                                                    ->schema([
                                                                        LinkFieldSet::make('link'),
                                                                    ])
                                                                    ->minItems(1)
                                                                    ->maxItems(3)
                                                                    ->reorderable(),
                                                            ]),
                                                    ]),
                                            ]),

                                        Builder\Block::make('image_with_text_carousel')
                                            ->label('Image with Text Carousel')
                                            ->schema([
                                                Forms\Components\Tabs::make('Image with Text Carousel Details')
                                                    ->tabs([
                                                        Forms\Components\Tabs\Tab::make('Background')
                                                            ->label('Background')
                                                            ->schema([
                                                                FileUpload::make('backgroundImage')
                                                                    ->label('Background Image')
                                                                    ->directory('uploads/pages/image-with-text-carousel/background-image')
                                                                    ->preserveFilenames()
                                                                    ->acceptedFileTypes(['image/*'])
                                                                    ->openable(),
                                                            ]),

                                                        Forms\Components\Tabs\Tab::make('Carousel Items')
                                                            ->label('Carousel Items')
                                                            ->schema([
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
                                                    ]),
                                            ]),

                                        Builder\Block::make('title_with_content')
                                            ->label('Title with Content')
                                            ->schema([
                                                Forms\Components\Tabs::make('Title with Content Details')
                                                    ->tabs([
                                                        Forms\Components\Tabs\Tab::make('Background')
                                                            ->label('Background')
                                                            ->schema([
                                                                FileUpload::make('backgroundImage')
                                                                    ->label('Background Image')
                                                                    ->directory('uploads/pages/image-with-text-carousel/background-image')
                                                                    ->preserveFilenames()
                                                                    ->acceptedFileTypes(['image/*'])
                                                                    ->openable(),
                                                            ]),

                                                        Forms\Components\Tabs\Tab::make('Content')
                                                            ->label('Content')
                                                            ->schema([
                                                                TextInput::make('title')
                                                                    ->label('Title')
                                                                    ->maxLength(100)
                                                                    ->required(),

                                                                Textarea::make('content')
                                                                    ->label('Content')
                                                                    ->rows(4)
                                                                    ->required(),
                                                            ]),
                                                    ]),
                                            ]),

                                        Builder\Block::make('full_with_image')
                                            ->label('Full with Image')
                                            ->schema([
                                                Forms\Components\Tabs::make('Full with Image Details')
                                                    ->tabs([
                                                        Forms\Components\Tabs\Tab::make('Image')
                                                            ->label('Image')
                                                            ->schema([
                                                                FileUpload::make('image')
                                                                    ->label('Image')
                                                                    ->directory('uploads/pages/full-with-image/image')
                                                                    ->preserveFilenames()
                                                                    ->acceptedFileTypes(['image/*'])
                                                                    ->columnSpanFull()
                                                                    ->openable(),
                                                            ]),
                                                    ]),
                                            ]),

                                        Builder\Block::make('icon_text_grid_block')
                                            ->label('Icon Text Grid Block')
                                            ->schema([
                                                Forms\Components\Tabs::make('Icon Text Grid Block Details')
                                                    ->tabs([
                                                        Forms\Components\Tabs\Tab::make('General')
                                                            ->label('General')
                                                            ->schema([
                                                                TextInput::make('title')
                                                                    ->label('Title')
                                                                    ->required()
                                                                    ->maxLength(255),
                                                            ]),

                                                        Forms\Components\Tabs\Tab::make('Images')
                                                            ->label('Images')
                                                            ->schema([
                                                                FileUpload::make('icon_image')
                                                                    ->label('Icon Image')
                                                                    ->directory('uploads/pages/full-with-image/image')
                                                                    ->preserveFilenames()
                                                                    ->acceptedFileTypes(['image/*'])
                                                                    ->columnSpanFull()
                                                                    ->openable(),

                                                                FileUpload::make('backgroundImage')
                                                                    ->label('Background Image')
                                                                    ->directory('uploads/pages/icon-text-grid-block/background-image')
                                                                    ->preserveFilenames()
                                                                    ->acceptedFileTypes(['image/*'])
                                                                    ->openable(),
                                                            ]),

                                                        Forms\Components\Tabs\Tab::make('Columns')
                                                            ->label('Columns')
                                                            ->schema([
                                                                Repeater::make('columns')
                                                                    ->label('Columns')
                                                                    ->schema([
                                                                        Forms\Components\Select::make('type')
                                                                            ->label('Type')
                                                                            ->options([
                                                                                'single' => 'Single Column',
                                                                                'two' => 'Two Column',
                                                                                'three' => 'Three Column',
                                                                            ])
                                                                            ->columnSpanFull()
                                                                            ->live()
                                                                            ->afterStateUpdated(fn (Select $component) => $component
                                                                                ->getContainer()
                                                                                ->getComponent('dynamicColumnType')
                                                                                ->getChildComponentContainer()
                                                                                ->fill()),

                                                                        Grid::make(2)
                                                                            ->schema(fn (Get $get): array => match ($get('type')) {
                                                                                'single' => [
                                                                                    Grid::make(1)
                                                                                        ->schema([
                                                                                            RichEditor::make('column_1')
                                                                                                ->label('Column 1 Text')
                                                                                                ->required(),
                                                                                        ]),
                                                                                ],
                                                                                'two' => [
                                                                                    Grid::make(2)
                                                                                        ->schema([
                                                                                            RichEditor::make('column_1')
                                                                                                ->label('Column 1 Text')
                                                                                                ->required(),

                                                                                            RichEditor::make('column_2')
                                                                                                ->label('Column 2 Text')
                                                                                                ->required(),
                                                                                        ]),
                                                                                ],
                                                                                'three' => [
                                                                                    Grid::make(3)
                                                                                        ->schema([
                                                                                            RichEditor::make('column_1')
                                                                                                ->label('Column 1 Text')
                                                                                                ->required(),

                                                                                            RichEditor::make('column_2')
                                                                                                ->label('Column 2 Text')
                                                                                                ->required(),

                                                                                            RichEditor::make('column_3')
                                                                                                ->label('Column 3 Text')
                                                                                                ->required(),
                                                                                        ]),
                                                                                ],
                                                                                default => [],
                                                                            })
                                                                            ->key('dynamicColumnType'),
                                                                    ]),
                                                            ]),
                                                    ]),
                                            ]),

                                        Builder\Block::make('full_with_content')
                                            ->label('Full with page builder')
                                            ->schema([
                                                Forms\Components\Tabs::make('Full with Content Details')
                                                ->tabs([
                                                    Forms\Components\Tabs\Tab::make('General')
                                                        ->label('General')
                                                        ->schema([
                                                            TextInput::make('title')
                                                                ->label('Title')
                                                                ->required()
                                                                ->maxLength(255),
                                                        ]),
                                                    Forms\Components\Tabs\Tab::make('Content')
                                                        ->label('Content')
                                                        ->schema([

                                                            Repeater::make('columns')
                                                                ->label('Rows')
                                                                ->reorderable()
                                                                ->schema([
                                                                    Forms\Components\Select::make('type')
                                                                        ->label('Type')
                                                                        ->options([
                                                                            'single' => 'Single Column Row',
                                                                            'two' => 'Two Column Row',
                                                                            'two-1-2' => 'Two Column 1:2 Row',
                                                                            'three' => 'Three Column Row',
                                                                            'button' => 'Button Column Row',
                                                                            'images' => 'Image Column Row',
                                                                            'pdf' => 'PDF Column Row',
                                                                            'downloads' => 'Download Column Row',
                                                                        ])
                                                                        ->columnSpanFull()
                                                                        ->live()
                                                                        ->afterStateUpdated(fn (Select $component) => $component
                                                                            ->getContainer()
                                                                            ->getComponent('dynamicPageRowBuilder')
                                                                            ->getChildComponentContainer()
                                                                            ->fill()),

                                                                    Grid::make(2)
                                                                        ->schema(fn (Get $get): array => match ($get('type')) {
                                                                            'single' => [
                                                                                Grid::make(1)
                                                                                    ->schema([
                                                                                        TextInput::make('title')
                                                                                            ->label('Title'),

                                                                                        RichEditor::make('column_1')
                                                                                            ->label('Column 1 Text')
                                                                                            ->required(),
                                                                                    ]),
                                                                            ],
                                                                            'two' => [
                                                                                Grid::make(2)
                                                                                    ->schema([
                                                                                        TextInput::make('title')
                                                                                            ->label('Title'),

                                                                                        RichEditor::make('column_1')
                                                                                            ->label('Column 1 Text')
                                                                                            ->required(),

                                                                                        RichEditor::make('column_2')
                                                                                            ->label('Column 2 Text')
                                                                                            ->required(),
                                                                                    ]),
                                                                            ],
                                                                            'two-1-2' => [
                                                                                Grid::make(3)
                                                                                    ->schema([
                                                                                        TextInput::make('title')
                                                                                            ->label('Title')
                                                                                            ->columnSpanFull(),

                                                                                        Toggle::make('reverse')
                                                                                            ->label('Reverse Order'),

                                                                                        RichEditor::make('column_1')
                                                                                            ->label('Column 1 Text')
                                                                                            ->required(),

                                                                                        RichEditor::make('column_2')
                                                                                            ->label('Column 2 Text')
                                                                                            ->columnSpan(2)
                                                                                            ->required(),
                                                                                    ]),
                                                                            ],
                                                                            'three' => [
                                                                                Grid::make(3)
                                                                                    ->schema([
                                                                                        TextInput::make('title')
                                                                                            ->label('Title')
                                                                                            ->columnSpanFull(),

                                                                                        RichEditor::make('column_1')
                                                                                            ->label('Column 1 Text')
                                                                                            ->required(),

                                                                                        RichEditor::make('column_2')
                                                                                            ->label('Column 2 Text')
                                                                                            ->required(),

                                                                                        RichEditor::make('column_3')
                                                                                            ->label('Column 3 Text')
                                                                                            ->required(),
                                                                                    ]),
                                                                            ],
                                                                            'button' => [
                                                                                Grid::make(1)
                                                                                    ->schema([
                                                                                        Repeater::make('button_columns')
                                                                                            ->label('Button Columns')
                                                                                            ->schema([
                                                                                                LinkFieldSet::make('link'),
                                                                                            ])
                                                                                            ->minItems(1)
                                                                                            ->maxItems(3)
                                                                                            ->reorderable(),
                                                                                    ]),
                                                                            ],
                                                                            'images' => [
                                                                                Grid::make(1)
                                                                                    ->schema([
                                                                                        TextInput::make('title')
                                                                                            ->label('Title')
                                                                                            ->columnSpanFull(),

                                                                                        FileUpload::make('images')
                                                                                            ->label('Images')
                                                                                            ->directory('uploads/pages/full-with-content/image')
                                                                                            ->preserveFilenames()
                                                                                            ->acceptedFileTypes(['image/*'])
                                                                                            ->multiple()
                                                                                            ->required()
                                                                                    ])
                                                                            ],
                                                                            'pdf' => [
                                                                                Grid::make(1)
                                                                                    ->schema([
                                                                                        TextInput::make('title')
                                                                                            ->label('Title')
                                                                                            ->columnSpanFull(),

                                                                                        FileUpload::make('pdf')
                                                                                            ->label('PDF')
                                                                                            ->directory('uploads/pages/full-with-content/pdf')
                                                                                            ->preserveFilenames()
                                                                                            ->required()
                                                                                            ->multiple()
                                                                                            ->acceptedFileTypes(['application/pdf'])
                                                                                    ])
                                                                            ],
                                                                            'downloads' => [
                                                                                Grid::make(1)
                                                                                    ->schema([
                                                                                        TextInput::make('title')
                                                                                            ->label('Title')
                                                                                            ->columnSpanFull(),

                                                                                        Repeater::make('downloads')
                                                                                            ->label('Downloads')
                                                                                            ->schema([

                                                                                                TextInput::make('title')
                                                                                                    ->label('Title')
                                                                                                    ->required()
                                                                                                    ->columnSpanFull(),

                                                                                                FileUpload::make('file')
                                                                                                ->label('File')
                                                                                                ->directory('uploads/pages/full-with-content/downloads')
                                                                                                ->preserveFilenames()
                                                                                                ->acceptedFileTypes(['application/pdf', 'application/zip', 'application/word'])
                                                                                                ->required(),
                                                                                            ])
                                                                                    ])
                                                                            ],
                                                                            default => [],
                                                                        })
                                                                        ->key('dynamicPageRowBuilder'),
                                                                ]),
                                                        ])
                                                ])
                                            ])

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
                                    ->columnSpanFull()
                                    ->native(false),

                            ]),

                        Forms\Components\Tabs\Tab::make('Settings')
                            ->schema([
                                Forms\Components\TextInput::make('author')
                                    ->default('')
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

                Tables\Actions\Action::make('preview')
                    ->icon('heroicon-o-globe-alt')
                    ->label('Preview')
                    ->url(fn($record) => url('preview/page/'.$record->slug))
                    ->openUrlInNewTab(),

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
