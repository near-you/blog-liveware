<?php

namespace App\Filament\Resources\About\AboutResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\About\Skill;
use App\Models\About\SkillTitle;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Repeater;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class SkillTitlesRelationManager extends RelationManager
{
    protected static string $relationship = 'skillTitles';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('The name of the Skill group')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label(__('Skill title'))
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                    ]),


                Fieldset::make('Skills group')
                    ->schema([
                        Repeater::make('skills')
                            ->relationship('skills')
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->label(__('Skill'))
                                    ->required()
                                    ->maxLength(255),

                                Forms\Components\TextInput::make('percent')
                                    ->label(__('Percents'))
                                    ->required()
                                    ->suffix('%')
                                    ->integer()
                                    ->maxLength(3),
                            ])->columns(2)->columnSpanFull(),
                        ]),


            ]);

    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                Tables\Columns\TextColumn::make('title'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->visible(fn () => SkillTitle::count() < 2),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ]);
    }
}
