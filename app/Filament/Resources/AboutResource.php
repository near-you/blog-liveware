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

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('my_profession')
                            ->label('Profession')
                            ->required()
                            ->maxLength(250),
                        Forms\Components\FileUpload::make('image')
                            ->image(),
                    ])->columnSpan(5),

                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Textarea::make('description')
                            ->maxLength(65535)
                            ->columnSpanFull()
                            ->rows(6),
                    ])->columnSpan(7),

                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\DatePicker::make('date_of_birth')
                                    ->label('Birthday')
                                    ->native(false)
                                    ->minDate(now()->subYears(90))
                                    ->maxDate(now()),
                                Forms\Components\TextInput::make('age')
                                    ->integer()
                                    ->maxLength(3),
                                Forms\Components\TextInput::make('address')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('email')
                                    ->email()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('phone')
                                    ->tel()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('nationality')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('study')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('degree')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('interest')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('freelance')
                                    ->maxLength(255),
                            ])
//                    ->columns(3)
//                    ->columnSpan(['lg' => fn(?About $record) => $record === null ? 3 : 2]),
                    ]),

            ])->columns(12);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('my_profession')
                    ->label('Profession')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('birthday')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nationality')
                    ->searchable(),
                Tables\Columns\TextColumn::make('study')
                    ->searchable(),
                Tables\Columns\TextColumn::make('degree')
                    ->searchable(),
                Tables\Columns\TextColumn::make('interest')
                    ->searchable(),
                Tables\Columns\TextColumn::make('freelance')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\KnowledgeRelationManager::class,
            RelationManagers\InterestRelationManager::class,
            RelationManagers\EducationRelationManager::class,
            RelationManagers\ExperienceRelationManager::class,
            //RelationManagers\SkillTitleRelationManager::class,
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

//    public static function getRecordSubNavigation(Page $page): array
//    {
//        return $page->generateNavigationItems([
//            Pages\ManageSkillTitle::class,
//            Pages\EditSkill::class,
//        ]);
//    }


}
