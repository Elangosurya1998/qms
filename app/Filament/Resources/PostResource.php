<?php

namespace App\Filament\Resources;

use App\Filament\Forms\Components\LinkFieldSet;
use App\Filament\Resources\PostResource\Pages;
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
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Toggle;
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

                                Forms\Components\Select::make('categories')
                                    ->relationship('categories', 'name')
                                    ->required()
                                    ->preload()
                                    ->multiple(),

                                Forms\Components\FileUpload::make('feature_image')
                                    ->image()
                                    ->directory('file-manager/post/feature_image')
                                    ->preserveFilenames()
                                    ->maxSize(1024 * 2),

                                Forms\Components\Textarea::make('excerpt'),
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
                                Repeater::make('content')
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
                Tables\Columns\TextColumn::make('title')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\ImageColumn::make('feature_image')
                    ->toggleable(isToggledHiddenByDefault: true),
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
                Tables\Actions\Action::make('preview')
                  ->icon('heroicon-o-globe-alt')
                  ->label('Preview')
                  ->url(fn($record) => url('preview/post/'.$record->slug))
                  ->openUrlInNewTab(),
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
