<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms;
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
                            ->schema([
                                Forms\Components\FileUpload::make('content.hero')
                                    ->disk(config('media-library.disk_name'))
                                    ->directory('pages')
                                    ->acceptedFileTypes(['image/*', 'video/*'])
                                    ->preserveFilenames()
                                    ->columnSpanFull(),

                                Forms\Components\Textarea::make('content.hero_caption')
                                    ->label('Hero Caption')
                                    ->placeholder('Enter hero caption text here...'),
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
