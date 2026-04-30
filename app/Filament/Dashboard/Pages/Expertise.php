<?php

namespace App\Filament\Dashboard\Pages;

use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class Expertise extends Page
{
    protected string $view = 'filament.dashboard.pages.expertise';

    public $data = [];

    public function mount()
    {
        $this->form->fill($this->getRecord()->attributesToArray());
    }

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            Form::make([
                Section::make('Specialization')
                    ->components([
                        Select::make('specializations.id')
                            ->relationship('specializations', 'name')
                            ->multiple()
                    ]),
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

        // dd($data);

        $record->update($data);

        Notification::make()
            ->body('Record updated')
            ->success();
    }

    public function getRecord()
    {
        return Filament::auth()->user()->trainer;
    }
}
