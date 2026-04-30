<?php

namespace App\Filament\Dashboard\Pages;

use App\Models\Tag;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
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
                Select::make('specializations.id')
                    ->relationship('specializations', 'name')
                    ->multiple()
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('name'),
                        Hidden::make('category')->default('specialization')
                    ])
                    ->createOptionModalHeading('Add Specialization')
                    ->createOptionUsing(function ($data) {
                        return Tag::firstOrCreate([
                            'name' => $data['name'],
                            'category' => $data['category']
                        ])->id;
                    }),
                Select::make('industries.id')
                    ->relationship('industries', 'name')
                    ->multiple()
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('name'),
                        Hidden::make('category')->default('industry')
                    ])
                    ->createOptionModalHeading('Add Industry Experience')
                    ->createOptionUsing(function ($data) {
                        return Tag::firstOrCreate([
                            'name' => $data['name'],
                            'category' => $data['category']
                        ])->id;
                    }),
                Select::make('methods.id')
                    ->label("Training Methods")
                    ->relationship('trainingMethods', 'name')
                    ->multiple()
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('name'),
                        Hidden::make('category')->default('method')
                    ])
                    ->createOptionModalHeading('Add Training Method')
                    ->createOptionUsing(function ($data) {
                        return Tag::firstOrCreate([
                            'name' => $data['name'],
                            'category' => $data['category']
                        ])->id;
                    }),
                Select::make('tools.id')
                    ->label("Technical Skills/Tools")
                    ->relationship('tools', 'name')
                    ->multiple()
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('name'),
                        Hidden::make('category')->default('tools')
                    ])
                    ->createOptionModalHeading('Add Technical Skill/Tools')
                    ->createOptionUsing(function ($data) {
                        return Tag::firstOrCreate([
                            'name' => $data['name'],
                            'category' => $data['category']
                        ])->id;
                    }),

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
            ->title("Updated!")
            ->body('Record has been successfully update')
            ->success()
            ->send();
    }

    public function getRecord()
    {
        return Filament::auth()->user()->trainer;
    }
}
