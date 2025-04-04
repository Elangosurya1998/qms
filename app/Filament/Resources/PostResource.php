<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Page;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Builder;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'CMS';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Post Details')
                    ->columnSpanFull()
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Basic Information')
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->unique(ignoreRecord: true)
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))

                                    ->maxLength(255),
                                Forms\Components\FileUpload::make('feature_image')
                                    ->image()
                                    ->directory('file-manager/post/feature_image')
                                    ->preserveFilenames()
                                    ->maxSize(1024 * 2),
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

                        Forms\Components\Tabs\Tab::make('Categories')
                            ->columns(2)
                            ->schema([
                                Forms\Components\Select::make('categories')
                                    ->relationship('categories', 'name')
                                    ->required()
                                    ->preload()
                                    ->multiple(),
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

                                        Builder\Block::make('full_with_image')
                                            ->label('Full with Image')
                                            ->schema([

                                                FileUpload::make('image')
                                                    ->label('Image')
                                                    ->directory('uploads/pages/full-with-image/image')
                                                    ->preserveFilenames()
                                                    ->acceptedFileTypes(['image/*'])
                                                    ->columnSpanFull()
                                                    ->openable(),

                                            ]),

                                        Builder\Block::make('icon_text_grid_block')
                                            ->label('Icon Text Grid Block')
                                            ->schema([

                                                TextInput::make('title')
                                                    ->label('Title')
                                                    ->required()
                                                    ->maxLength(255),

                                                FileUpload::make('icon_image')
                                                    ->label('Icon Image')
                                                    ->directory('uploads/pages/full-with-image/image')
                                                    ->preserveFilenames()
                                                    ->acceptedFileTypes(['image/*'])
                                                    ->columnSpanFull()
                                                    ->openable(),

                                                ColorPicker::make('background_color')
                                                    ->label('Background Color'),

                                                FileUpload::make('backgroundImage')
                                                    ->label('Background Image')
                                                    ->directory('uploads/pages/icon-text-grid-block/background-image')
                                                    ->preserveFilenames()
                                                    ->acceptedFileTypes(['image/*'])
                                                    ->openable(),

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
                                                                            MarkdownEditor::make('column_1')
                                                                                ->enableToolbarButtons([
                                                                                    'attachFiles',
                                                                                    'blockquote',
                                                                                    'bold',
                                                                                    'bulletList',
                                                                                    'codeBlock',
                                                                                    'heading',
                                                                                    'h2',
                                                                                    'h3',
                                                                                    'heading4',
                                                                                    'heading5',
                                                                                    'heading6',
                                                                                    'italic',
                                                                                    'link',
                                                                                    'orderedList',
                                                                                    'redo',
                                                                                    'strike',
                                                                                    'table',
                                                                                    'undo',
                                                                                ])
                                                                                ->label('Column 1 Text')
                                                                                ->required(),
                                                                        ]),
                                                                ],
                                                                'two' => [
                                                                    Grid::make(2)
                                                                        ->schema([
                                                                            MarkdownEditor::make('column_1')
                                                                                ->label('Column 1 Text')
                                                                                ->required(),

                                                                            MarkdownEditor::make('column_2')
                                                                                ->label('Column 2 Text')
                                                                                ->required(),
                                                                        ]),
                                                                ],
                                                                'three' => [
                                                                    Grid::make(3)
                                                                        ->schema([
                                                                            MarkdownEditor::make('column_1')
                                                                                ->label('Column 1 Text')
                                                                                ->required(),

                                                                            MarkdownEditor::make('column_2')
                                                                                ->label('Column 2 Text')
                                                                                ->required(),

                                                                            MarkdownEditor::make('column_3')
                                                                                ->label('Column 3 Text')
                                                                                ->required(),
                                                                        ]),
                                                                ],
                                                                default => [],
                                                            })
                                                            ->key('dynamicColumnType')
                                                    ]),
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
                            ->columns(2)
                            ->schema([
                                Forms\Components\TextInput::make('author')
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
                Tables\Columns\ImageColumn::make('feature_image'),
                Tables\Columns\TextColumn::make('title')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug_url')
                    ->icon('heroicon-o-clipboard')
                    ->tooltip('Copy Link')
                    ->limit(20)
                    ->label('Link')
                    ->copyable()
                    ->copyMessage('Link copied'),
                Tables\Columns\TextColumn::make('category_names')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('author')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),

                Tables\Columns\TextColumn::make('publish_date')
                    ->date()
                    ->sortable()
                    ->searchable()
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
                ])

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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
