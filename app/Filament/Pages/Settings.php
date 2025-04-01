<?php

namespace App\Filament\Pages;

use App\Models\SiteSetting;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Database\Eloquent\Model;

class Settings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $navigationLabel = 'Site Settings';

    protected static ?string $navigationIcon = 'heroicon-o-cog-8-tooth';

    protected static string $view = 'filament.pages.settings';

    public $data; // State for form binding

    // Ensure your model is defined here
    protected function getFormModel(): Model|string|null
    {
        return SiteSetting::first();
    }

    public function mount()
    {
        $this->data = SiteSetting::first()?->toArray(); // Pre-fill state from the model
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema($this->getFormSchema())
            ->model($this->getFormModel())
            ->statePath('data')
            ->operation($this->getFormContext());
    }

    protected function getFormSchema(): array
    {
        return [
            Tabs::make('site_tabs')
                ->columnSpanFull()
                ->columns(2)
                ->tabs([
                    Tab::make('General')
                        ->schema([
                            TextInput::make('name')
                                ->required()
                                ->maxLength(255),
                            Select::make('homepage_id')
                                ->label('Homepage')
                                ->native(false)
                                ->options(fn () => \App\Models\Page::all()->pluck('title', 'id'))
                                ->searchable()
                                ->required()
                                ->columnSpan(['lg' => 1]),
                            TextInput::make('email')
                                ->email()
                                ->required()
                                ->maxLength(255),
                            TextInput::make('phone')
                                ->required()
                                ->maxLength(255),
                            Textarea::make('address')
                                ->required()
                                ->maxLength(500),
                            Textarea::make('description')
                                ->required()
                                ->maxLength(500),
                        ]),
                    Tab::make('Certifications')
                        ->schema([
                            Repeater::make('certifications')
                                ->schema([
                                    TextInput::make('name')
                                        ->required()
                                        ->maxLength(255),
                                ])
                                ->columnSpanFull(),
                        ]),
                    Tab::make('Social')
                        ->schema([
                            Repeater::make('social_links')
                                ->schema([
                                    TextInput::make('name')
                                        ->required()
                                        ->maxLength(255),
                                    TextInput::make('url')
                                        ->url()
                                        ->required()
                                        ->maxLength(255),
                                ])
                                ->columns(2)
                                ->columnSpanFull(),
                        ]),
                    Tab::make('Meta')
                        ->columns(2)
                        ->schema([
                            TextInput::make('meta.title')
                                ->label('Title')
                                ->maxLength(255),
                            TextInput::make('meta.keywords')
                                ->label('Keywords')
                                ->maxLength(255),
                            Textarea::make('meta.description')
                                ->label('Description')
                                ->columnSpanFull()
                                ->maxLength(500),
                        ]),
                ]),
        ];
    }


    public function submit()
    {
        $state = $this->form->getState();

        // Find the current Site instance
        $site = SiteSetting::first();

        // Update the instance with form data
        $site->fill($state);

        $site->save();

        // Send a success notification
        Notification::make()
            ->title('Settings updated successfully!')
            ->success()
            ->send();
    }
}
