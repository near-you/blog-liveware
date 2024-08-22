<?php

namespace App\Filament\Resources\Service\ServiceResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ServiceFunFactSectionRelationManager extends RelationManager
{
    protected static string $relationship = 'serviceFunFactSection';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Fieldset::make(__('Partner Section'))
                    ->schema([
                        Forms\Components\TextInput::make('fact_title')
                            ->label(__('Fun Facts Title'))
                            ->required()
                            ->maxLength(150),

                        Forms\Components\TextInput::make('fact_count')
                            ->label(__('Fun Facts Count'))
                            ->integer(),
                    ]),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('fact_title')
            ->columns([
                Tables\Columns\TextColumn::make('fact_title')
                    ->label(__('Fun Facts')),

                Tables\Columns\TextColumn::make('fact_count')
                    ->label(__('Fun Facts Count'))
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
