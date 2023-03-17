<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Hash;
use Auth;

class Settings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string $view = 'filament.pages.settings';

    public $name;

    public $email;

    public $current_password;

    public $new_password;

    public $new_password_confirmation;

    public function mount()
    {
        $this->form->fill([
            'first_name' => auth()->user()->first_name,
            'last_name' => auth()->user()->last_name,
            'email' => auth()->user()->email,
        ]);
    }

    public function getTitle(): string {
        return __('resources/profile.name');
    }

    protected static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    public function submit()
    {
        $this->form->getState();

        $state = array_filter([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->new_password ? Hash::make($this->new_password) : null,
        ]);

        $user = Auth::user();

        $user->update($state);

        $this->reset(['current_password', 'new_password', 'new_password_confirmation']);
        $this->notify('success', __('resources/profile.form.messages.success'));
    }

    public function getCancelButtonUrlProperty()
    {
        return static::getUrl();
    }

    protected function getBreadcrumbs(): array
    {
        return [
            url()->current() => __('resources/profile.name'),
        ];
    }

    protected function getFormSchema(): array
    {
        return [
            Section::make(__('resources/profile.form.sections.general'))
                ->columns(2)
                ->schema([
                    TextInput::make('first_name')
                        ->label(__('resources/profile.form.fields.first_name'))
                        ->required(),
                    TextInput::make('last_name')
                        ->label(__('resources/profile.form.fields.last_name'))
                        ->required(),
                    TextInput::make('email')
                        ->label(__('resources/profile.form.fields.email'))
                        ->disabled(),
                ]),
            Section::make(__('resources/profile.form.sections.password'))
                ->columns(2)
                ->schema([
                    TextInput::make('current_password')
                    ->label(__('resources/profile.form.fields.current_password'))
                        ->password()
                        ->rules(['required_with:new_password'])
                        ->currentPassword()
                        ->autocomplete('off')
                        ->columnSpan(1),
                    Grid::make()
                        ->schema([
                            TextInput::make('new_password')
                                ->label(__('resources/profile.form.fields.new_password'))
                                ->password()
                                ->rules(['confirmed'])
                                ->autocomplete('new-password'),

                            TextInput::make('new_password_confirmation')
                                ->label(__('resources/profile.form.fields.new_password_confirmation'))
                                ->password()
                                ->rules([
                                    'required_with:new_password',
                                ])
                                ->autocomplete('new-password'),
                        ]),
                ]),
        ];
    }
}
