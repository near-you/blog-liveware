<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutResource\Pages;
use App\Filament\Resources\AboutResource\RelationManagers;
use App\Models\About\About;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AboutResource extends Resource
{
    protected static ?string $model = About::class;

    protected static ?string $navigationGroup = 'Profile Management';

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
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\RichEditor::make('description')
                                    ->label(__('Description'))
                                    ->maxLength(65535),
                                    // ->columnSpanFull(),


                                Forms\Components\FileUpload::make('image')
                                    ->image()
                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        null,
                                        '16:9',
                                        '4:3',
                                        '1:1',
                                    ]),
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

                Tables\Columns\ImageColumn::make('image')
                    ->label(__('Image')),
//                Tables\Columns\TextColumn::make('date_of_birth')
//                    ->label(__('Birthday'))
//                    ->dateTime('d-m-Y'),
//                Tables\Columns\TextColumn::make('address')
//                    ->label(__('Address'))
//                    ->searchable(),
//                Tables\Columns\TextColumn::make('email')
//                    ->label(__('Email'))
//                    ->icon('heroicon-m-envelope')
//                    ->iconColor('primary')
//                    ->copyable()
//                    ->copyMessage(__('Email address copied'))
//                    ->copyMessageDuration(1500)
//                    ->searchable(),
//                Tables\Columns\TextColumn::make('phone')
//                    ->label(__('Phone'))
//                    ->searchable(),
//                Tables\Columns\TextColumn::make('nationality')
//                    ->searchable(),
//                Tables\Columns\TextColumn::make('study')
//                    ->searchable(),
//                Tables\Columns\TextColumn::make('degree')
//                    ->searchable(),
//                Tables\Columns\TextColumn::make('interest')
//                    ->searchable(),
//                Tables\Columns\TextColumn::make('freelance')
//                    ->searchable(),
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
            RelationManagers\KnowledgeRelationManager::class,
            RelationManagers\InterestRelationManager::class,
            RelationManagers\EducationRelationManager::class,
            RelationManagers\ExperienceRelationManager::class,
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

    // public static function infolist(Infolist $infolist): Infolist
    // {
    //     return $infolist
    //         ->schema([
    //             Infolists\Components\TextEntry::make('profession')
    //                 ->label(__('Profession')),
    //             Infolists\Components\TextEntry::make('email')
    //                 ->label(__('Email')),
    //             Infolists\Components\ImageEntry::make('image')
    //                 ->columnSpanFull(),
    //             Infolists\Components\TextEntry::make('description')
    //                 ->label(__('Description'))
    //                 ->html()
    //                 ->columnSpanFull(),
    //         ]);
    // }
}
