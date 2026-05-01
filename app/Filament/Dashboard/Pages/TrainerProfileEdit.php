<?php

namespace App\Filament\Dashboard\Pages;

use App\Models\Tag;
use App\Models\TrainerProfile;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class TrainerProfileEdit extends Page
{
    protected string $view = 'filament.dashboard.pages.trainer-profile-edit';

    protected static ?string $slug = 'trainer-profile';
    protected static ?string $navigationLabel = 'Edit Profile';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::UserCircle;

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
                    Section::make('Personal Information')->schema([
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
                        Textarea::make('professional_summary'),
                        FileUpload::make('cv_path')
                            ->label("CV/Resume")
                            ->disk('public')
                            ->directory('cvs')
                            ->openable()
                    ])
                        ->collapsible()
                        ->collapsed(),
                    Section::make('Social Medias')
                        ->schema([
                            Repeater::make('socialLinks')
                                ->relationship()
                                ->schema([
                                    TextInput::make('platform')
                                        ->columnSpan(1),
                                    TextInput::make('url')
                                        ->columnSpan(1),
                                ])
                                ->columns(2)
                                ->itemLabel(fn(array $state): ?string => $state['platform'] ?? null)
                        ])
                        ->collapsible()
                        ->collapsed(),
                    Section::make('Education')
                        ->schema([
                            Repeater::make('educations')
                                ->relationship()
                                ->schema([
                                    TextInput::make('degree_name'),
                                    TextInput::make('institution_name'),
                                    TextInput::make('completion_year'),
                                    TextInput::make('location'),
                                    TextInput::make('grade'),

                                    FileUpload::make('document_paths')
                                        ->label('Documents')
                                        ->multiple()
                                        // ->acceptedFileTypes(['.png', '.jpg', '.pdf'])
                                        ->disk('public')
                                        ->directory('educations')
                                        ->visibility('public')
                                        ->columnSpanFull()
                                        ->openable()

                                ])
                                ->columns(2)
                                ->itemLabel(fn($state) => $state['degree_name'])
                                ->collapsed(),
                        ])
                        ->collapsible()
                        ->collapsed(),
                    Section::make('Certificates')
                        ->schema([
                            Repeater::make('certifications')
                                ->relationship()
                                ->schema([
                                    TextInput::make('certification_name'),
                                    TextInput::make('issuing_body'),
                                    TextInput::make('year_obtained'),
                                    TextInput::make('expires_at'),
                                    FileUpload::make('document_paths')
                                        ->label('Certificate File(s)')
                                        ->multiple()
                                        ->disk('public')
                                        ->directory('certificates')
                                        ->openable()
                                        ->columnSpanFull(),
                                ])
                                ->columns(2)
                                ->itemLabel(fn($state) => $state['certification_name'])
                                ->collapsed()
                        ])
                        ->collapsible()
                        ->collapsed(),
                    Section::make('Expertises & Skills')
                        ->schema([
                            Select::make('specializations.id')
                                ->hint('Select or create new specialty')
                                ->relationship('specializations', 'name')
                                ->multiple()
                                ->createOptionForm([
                                    TextInput::make('name'),
                                    Hidden::make('category')->default('specialization')
                                ])
                                ->createOptionUsing(function ($data) {
                                    return Tag::firstOrCreate([
                                        'name' => $data['name'],
                                        'category' => $data['category']
                                    ])->id;
                                })
                                ->preload(),
                            Select::make('industries.id')
                                ->label('Industry Experience')
                                ->hint('Select or add an industry')
                                ->relationship('industries', 'name')
                                ->multiple()
                                ->createOptionForm([
                                    TextInput::make('name'),
                                    Hidden::make('category')->default('industry')
                                ])
                                ->createOptionUsing(function ($data) {
                                    return Tag::firstOrCreate([
                                        'name' => $data['name'],
                                        'category' => $data['category']
                                    ])->id;
                                })
                                ->preload(),
                            Select::make('tools.id')
                                ->label('Technical Skills/Tools')
                                ->hint('Select or add skill/tool')
                                ->relationship('tools', 'name')
                                ->multiple()
                                ->createOptionForm([
                                    TextInput::make('name'),
                                    Hidden::make('category')->default('tools')
                                ])
                                ->createOptionUsing(function ($data) {
                                    return Tag::firstOrCreate([
                                        'name' => $data['name'],
                                        'category' => $data['category']
                                    ])->id;
                                })
                                ->preload(),
                            Select::make('trainingMethods.id')
                                ->label('Training Method & Format')
                                ->hint('Select or add training method')
                                ->relationship('trainingMethods', 'name')
                                ->multiple()
                                ->createOptionForm([
                                    TextInput::make('name'),
                                    Hidden::make('category')->default('training_methods')
                                ])
                                ->createOptionUsing(function ($data) {
                                    return Tag::firstOrCreate([
                                        'name' => $data['name'],
                                        'category' => $data['category']
                                    ])->id;
                                })
                                ->preload(),
                        ])
                        ->collapsible()
                        ->collapsed(),
                    Section::make('Languages')
                        ->schema([
                            Repeater::make('languages')
                                ->relationship()
                                ->schema([
                                    TextInput::make('language'),
                                    Select::make('proficiency')
                                        ->options([
                                            'Native' => 'Native',
                                            'Fluent' => 'Fluent',
                                            'Professional Working Proficiency' => 'Professional Working Proficiency',
                                            'Conversational' => 'Conversational',
                                            'Basic' => 'Basic',
                                        ])
                                ])
                                ->collapsed()
                                ->itemLabel(fn($state) => $state['language'])
                        ])
                        ->collapsible()
                        ->collapsed(),
                    Section::make('Work Experience')
                        ->schema([
                            Repeater::make('experiences')
                                ->relationship()
                                ->schema([
                                    TextInput::make('job_title'),
                                    TextInput::make('company_name'),
                                    DatePicker::make('start_date'),
                                    DatePicker::make('end_date'),
                                    Checkbox::make('is_current')
                                        ->columnSpanFull(),
                                    Textarea::make('responsibilities')->columnSpanFull()->rows(5),
                                    Textarea::make('achievements')->columnSpanFull()
                                        ->rows(5),
                                ])
                                ->collapsed()
                                ->columns(2)
                                ->itemLabel(fn($state) => $state['job_title'])
                        ])
                        ->collapsible()
                        ->collapsed(),
                    Section::make('Training Experience')
                        ->schema([
                            Textarea::make('notable_clients')
                                ->rows(5),
                            Repeater::make('recentPrograms')
                                ->relationship()
                                ->schema([
                                    TextInput::make('program_name'),
                                    TextInput::make('client'),
                                    TextInput::make('date_string')
                                        ->label('date'),
                                    TextInput::make('participant_count')
                                        ->numeric(),
                                    TextInput::make('duration')
                                ])
                                ->collapsed()
                                ->columns(2)
                                ->itemLabel(fn($state) => $state['program_name']),
                            TextInput::make('avg_evaluation_score')
                        ])
                        ->collapsible()
                        ->collapsed(),
                    Section::make('Engagement & Commercial Details')
                        ->schema([
                            Select::make('consultings.id')
                                ->label('Consulting Service Offered (optional)')
                                ->hint('Select or add service')
                                ->relationship('consultings', 'name')
                                ->multiple()
                                ->createOptionForm([
                                    TextInput::make('name'),
                                    Hidden::make('category')->default('consulting')
                                ])
                                ->createOptionUsing(function ($data) {
                                    return Tag::firstOrCreate([
                                        'name' => $data['name'],
                                        'category' => $data['category']
                                    ])->id;
                                })
                                ->preload(),
                            Select::make('coachings.id')
                                ->label('Coaching Format(s) Offered (optional)')
                                ->hint('Select or add coaching format')
                                ->relationship('coachings', 'name')
                                ->multiple()
                                ->createOptionForm([
                                    TextInput::make('name'),
                                    Hidden::make('category')->default('coaching')
                                ])
                                ->createOptionUsing(function ($data) {
                                    return Tag::firstOrCreate([
                                        'name' => $data['name'],
                                        'category' => $data['category']
                                    ])->id;
                                })
                                ->preload(),
                            Select::make('assesments.id')
                                ->label('Assessment Capabilities (optional)')
                                ->hint('Select or add assessment capabilities')
                                ->relationship('assessments', 'name')
                                ->multiple()
                                ->createOptionForm([
                                    TextInput::make('name'),
                                    Hidden::make('category')->default('assessment')
                                ])
                                ->createOptionUsing(function ($data) {
                                    return Tag::firstOrCreate([
                                        'name' => $data['name'],
                                        'category' => $data['category']
                                    ])->id;
                                })
                                ->preload(),
                        ])
                        ->collapsible()
                        ->collapsed(),
                    Section::make('Achievement and Recognition')
                        ->schema([
                            Repeater::make('awards')
                                ->relationship()
                                ->schema([
                                    TextInput::make('award_name'),
                                    TextInput::make('issuing_organization'),
                                    TextInput::make('year')
                                ])
                                ->collapsed()
                                ->columns(2)
                                ->itemLabel(fn($state) => $state['award_name']),
                            Repeater::make('publications')
                                ->relationship()
                                ->schema([
                                    TextInput::make('title'),
                                    TextInput::make('publication_name'),
                                    DatePicker::make('published_at'),
                                    TextInput::make('link'),
                                ])
                                ->columns(2)
                                ->collapsed()
                                ->itemLabel(fn($state) => $state['title']),
                            Repeater::make('speakingEngagements')
                                ->relationship()
                                ->schema([
                                    TextInput::make('event_name'),
                                    TextInput::make('role'),
                                    TextInput::make('topic'),
                                    TextInput::make('year'),
                                    TextInput::make('audience_size')
                                        ->numeric(),
                                ])
                                ->columns(2)
                                ->collapsed()
                                ->itemLabel(fn($state) => $state['event_name']),
                        ])
                        ->collapsible()
                        ->collapsed(),
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
