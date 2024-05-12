<?php

namespace App\Filament\Resources\About\SkillTitleResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class SkillRelationManager extends RelationManager
{
    protected static string $relationship = 'skill';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label(__('Skill'))
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('percent')
                    ->label(__('Percent'))
                    ->suffix('%')
                    ->required()
                    ->integer()
                    ->maxLength(3),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                Tables\Columns\TextColumn::make('title')
                ->label(__('Skill')),

                Tables\Columns\TextColumn::make('percent')
                ->label(__('Percent')),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
