<?php

namespace App\Filament\Pages;

use Filament\Forms;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;
use Filament\Notifications\Notification;

class EditProfile extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static ?string $navigationLabel = 'My Profile';
    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $slug = 'my-profile';

    // Initialize properties with default values to avoid Livewire null-type issues
    public $name = '';
    public $email = '';
    public $contact = '';
    public $whatsapp = '';
    public $city = '';
    public $state = '';
    public $location = '';
    public $pincode = '';
    public $about = '';
    public $slogan = '';
    public $company_image = null;
    public $logo = null;
    public $favicon = null;
    public $latitude = '';
    public $longitude = '';

    public function mount(): void
    {
        $profile = Auth::user()->companyProfile;

        if ($profile) {
            $this->fill($profile->toArray());
        }
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Section::make('Company Info')
                ->schema([
                    Forms\Components\TextInput::make('name')->required(),
                    Forms\Components\TextInput::make('slogan'),
                    Forms\Components\Textarea::make('about')->columnSpanFull(),
                ])
                ->columns(2),

            Forms\Components\Section::make('Contact Info')
                ->schema([
                    Forms\Components\TextInput::make('email')->email(),
                    Forms\Components\TextInput::make('contact')->label('Contact Number')->maxLength(20),
                    Forms\Components\TextInput::make('whatsapp')->label('Whatsapp Number')->maxLength(20),
                    Forms\Components\TextInput::make('city'),
                    Forms\Components\TextInput::make('state'),
                    Forms\Components\TextInput::make('location'),
                    Forms\Components\TextInput::make('pincode'),
                ])
                ->columns(2),

            Forms\Components\Section::make('Map Location')
                ->schema([
                    Forms\Components\TextInput::make('latitude')->numeric(),
                    Forms\Components\TextInput::make('longitude')->numeric(),
                ])
                ->columns(2),
        ];
    }

    public function save(): void
    {
        $profile = Auth::user()->companyProfile;

        $data = $this->form->getState();

        if ($profile) {
            $profile->update($data);
        } else {
            Auth::user()->companyProfile()->create($data);
        }

        Notification::make()
            ->title('Profile updated successfully!')
            ->success()
            ->send();
    }

    protected static string $view = 'filament.pages.edit-profile';
}
