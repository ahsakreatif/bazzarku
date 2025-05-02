<?php

namespace App\Filament\Pages;

use Closure;
use Faker\Provider\ar_EG\Text;
use Filament\Pages\Page;
use Outerweb\FilamentSettings\Filament\Pages\Settings as BaseSettings;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TagsInput;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class Settings extends BaseSettings
{
    public static function getNavigationGroup(): ?string
    {
        return 'Settings';
    }

    public function schema(): array|Closure
    {
        return [
            Tabs::make('Settings')
                ->schema([
                    Tabs\Tab::make('General')
                        ->schema([
                            TextInput::make('general.brand_name')
                                ->required(),
                            TextInput::make('general.company_name'),
                            TextInput::make('general.email')
                                ->required(),
                            TextInput::make('general.phone')
                                ->required(),
                            TextInput::make('general.address_name_1'),
                            TinyEditor::make('general.address_desc_1'),
                            TextInput::make('general.address_name_2'),
                            TinyEditor::make('general.address_desc_2'),
                            TextInput::make('general.city'),
                            TextInput::make('general.state'),
                            FileUpload::make('general.logo')
                                ->image(),
                            TextInput::make('general.website')->url(),
                            TextInput::make('general.map')->url(),
                        ]),
                    Tabs\Tab::make('Seo')
                        ->schema([
                            TextInput::make('seo.title')
                                ->required(),
                            TextInput::make('seo.description')
                                ->required(),
                            TagsInput::make('seo.keywords'),
                            TextInput::make('seo.google_analytics'),
                            TextInput::make('seo.google_site_verification'),
                        ]),
                    Tabs\Tab::make('Social')
                        ->schema([
                            TextInput::make('social.whatsapp'),
                            TextInput::make('social.instagram'),
                            TextInput::make('social.facebook'),
                            TextInput::make('social.twitter'),
                        ]),
                ]),
            ];
    }
}
