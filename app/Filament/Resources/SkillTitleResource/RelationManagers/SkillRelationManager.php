<?php

namespace App\Filament\Resources\SkillTitleResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SkillRelationManager extends RelationManager
{
    protected static string $relationship = 'skill';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('skill_name')
                    ->label('Skill')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('skill_percent')
                    ->label('Skill Percent')
                    ->suffix('%')
                    ->required()
                    ->integer()
                    ->maxLength(3),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('skill_name')
            ->columns([
                Tables\Columns\TextColumn::make('skill_name'),
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
