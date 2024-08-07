<?php

namespace App\Filament\Resources\About;

use App\Events\ImageDeleted;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\About\About;
use Filament\Resources\Resource;
use App\Filament\Resources\About\AboutResource\Pages;
use App\Filament\Resources\About\AboutResource\RelationManagers\InterestRelationManager;
use App\Filament\Resources\About\AboutResource\RelationManagers\EducationRelationManager;
use App\Filament\Resources\About\AboutResource\RelationManagers\KnowledgeRelationManager;
use App\Filament\Resources\About\AboutResource\RelationManagers\ExperienceRelationManager;
use App\Filament\Resources\About\AboutResource\RelationManagers\SkillTitlesRelationManager;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\Event;

class AboutResource extends Resource
{
    protected static ?string $model = About::class;

    protected static ?string $navigationGroup = 'About Page';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationLabel = 'About';

    protected static ?string $navigationIcon = 'heroicon-o-identification';

    // protected static ?string $activeNavigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('profession')
                            ->label(__('Profession'))
                            ->required()
                            ->maxLength(250),
                    ]),

                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Grid::make(3)
                            ->schema([
                                Forms\Components\DatePicker::make('date_of_birth')
                                    ->label(__('Birthday'))
                                    ->native(false)
                                    ->minDate(now()->subYears(90))
                                    ->maxDate(now()),

                                Forms\Components\TextInput::make('address')
                                    ->label(__('Address'))
                                    ->maxLength(255),

                                Forms\Components\TextInput::make('email')
                                    ->label(__('Email'))
                                    ->email()
                                    ->maxLength(255),

                                Forms\Components\TextInput::make('phone')
                                    ->label(__('Phone'))
                                    ->tel()
//                                    ->mask('+49 (999) 9999999')
                                    ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/'),

                                Forms\Components\TextInput::make('nationality')
                                    ->label(__('Nationality'))
                                    ->maxLength(255),

                                Forms\Components\TextInput::make('study')
                                    ->label(__('Study'))
                                    ->maxLength(255),

                                Forms\Components\TextInput::make('degree')
                                    ->label(__('Degree'))
                                    ->maxLength(255),

                                Forms\Components\TextInput::make('interest')
                                    ->label(__('Interest'))
                                    ->maxLength(255),

                                Forms\Components\TextInput::make('freelance')
                                    ->label(__('Freelance'))
                                    ->maxLength(255),
                            ])
                    ]),

                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Grid::make(1)
                            ->schema([
                                Forms\Components\RichEditor::make('description')
                                    ->label(__('Description'))
                                    ->maxLength(65535),
                                // ->columnSpanFull(),


                            ]),
                    ]),

                Forms\Components\Section::make()
                    ->relationship('attachments')
                    ->schema([
                        Forms\Components\Grid::make(1)
                            ->schema([
                                Forms\Components\FileUpload::make('image')
                                    ->label(__('Upload Image'))
                                    ->required()
//                                            ->columnSpanFull()
                                    ->image()
                                    ->directory('images')
                                    ->imageEditor()
                                    //                          ->imageEditorMode(1)
                                    ->uploadingMessage('Uploading image...')
                                    ->imageEditorAspectRatios([
                                        null,
                                        '16:9',
                                        '4:3',
                                        '1:1',
                                    ])
                                    ->deleteUploadedFileUsing(function ($file) {
                                        Event::dispatch(new ImageDeleted($file));
                                    }),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('profession')
                    ->label(__('Profession'))
                    ->searchable(),

                Tables\Columns\ImageColumn::make('attachments.image')
                    ->label(__('Image')),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('Created'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('Updated'))
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            SkillTitlesRelationManager::class,
            KnowledgeRelationManager::class,
            InterestRelationManager::class,
            EducationRelationManager::class,
            ExperienceRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAbouts::route('/'),
            'create' => Pages\CreateAbout::route('/create'),
            'edit' => Pages\EditAbout::route('/{record}/edit'),
        ];
    }
}
