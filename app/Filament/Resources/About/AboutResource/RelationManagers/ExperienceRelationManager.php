<?php

namespace App\Filament\Resources\About\AboutResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ExperienceRelationManager extends RelationManager
{
    protected static string $relationship = 'experience';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('company')
                    ->label(__('Company'))
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('profession')
                    ->label(__('Profession'))
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('year_start')
                    ->label(__('Year Start'))
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('year_finish')
                    ->label(__('Year Finish'))
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('company')
            ->columns([
                Tables\Columns\TextColumn::make('company')
                    ->label(__('Company')),

                Tables\Columns\TextColumn::make('profession')
                    ->label(__('Profession')),

                Tables\Columns\TextColumn::make('year_start')
                    ->label(__('Year Start')),
                    
                Tables\Columns\TextColumn::make('year_finish')
                    ->label(__('Year Finish')),
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
