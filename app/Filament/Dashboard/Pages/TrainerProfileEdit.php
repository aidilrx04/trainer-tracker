<?php

namespace App\Filament\Dashboard\Pages;

use App\Models\TrainerProfile;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Schema;

class TrainerProfileEdit extends Page
{
    protected string $view = 'filament.dashboard.pages.trainer-profile-edit';

    protected static ?string $slug = 'trainer-profile';

    /**
     * @var array<string, mixed> | null
     */
    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill($this->getRecord()?->attributesToArray());
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Form::make([
                    TextInput::make('full_name')
                        ->helperText('Please use your legal name as it would appear on a contract.')
                        ->required(),
                    Textarea::make('home_address')
                        ->required(),
                    TextInput::make('email')
                        ->email()
                        ->required(),
                    TextInput::make('phone_number')
                        ->required(),
                    TextInput::make('years_experience')
                        ->numeric(),
                    Textarea::make('professional_summary')
                ])
                    ->livewireSubmitHandler('save')
                    ->footer([
                        Actions::make([
                            Action::make('save')
                                ->submit('save')
                                ->keyBindings(['mod+s']),
                        ]),
                    ]),
            ])
            ->record($this->getRecord())
            ->statePath('data');
    }

    public function save()
    {
        $data = $this->form->getState();

        $record = $this->getRecord();

        $record->fill($data);
        $record->save();

        Notification::make()
            ->success()
            ->title('Saved')
            ->send();
    }

    public function getRecord()
    {
        $userId = Filament::auth()->id();
        $record = TrainerProfile::firstWhere('user_id', $userId);


        return $record;;
    }
}
