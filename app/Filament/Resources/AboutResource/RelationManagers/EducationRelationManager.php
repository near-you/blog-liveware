<?php

namespace App\Filament\Resources\AboutResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EducationRelationManager extends RelationManager
{
    protected static string $relationship = 'education';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('education_institution_name')
                    ->required()
                    ->label(__('Education Institution'))
                    ->maxLength(255),
                Forms\Components\TextInput::make('education_degree')
                    ->required()
                    ->label(__('Degree'))
                    ->maxLength(255),
                Forms\Components\TextInput::make('education_year_start')
                    ->required()
                    ->label(__('Year Start'))
                    ->maxLength(255),
                Forms\Components\TextInput::make('education_year_finish')
                    ->required()
                    ->label(__('Year Finish'))
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('education_institution_name')
            ->columns([
                Tables\Columns\TextColumn::make('education_institution_name')
                    ->label(__('Education Institution')),
                Tables\Columns\TextColumn::make('education_degree')
                    ->label(__('Degree')),
                Tables\Columns\TextColumn::make('education_year_start')
                    ->label(__('Year Start')),
                Tables\Columns\TextColumn::make('education_year_finish')
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
