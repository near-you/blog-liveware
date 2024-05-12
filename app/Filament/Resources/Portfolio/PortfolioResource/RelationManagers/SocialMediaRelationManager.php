<?php

namespace App\Filament\Resources\Portfolio\PortfolioResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SocialMediaRelationManager extends RelationManager
{
    protected static string $relationship = 'socialMedia';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Social Media')
                    ->schema([
                        Forms\Components\TextInput::make('youtube')
                            ->label(__('YouTube'))
                            ->maxLength(255),
                        Forms\Components\TextInput::make('vimeo')
                            ->label(__('Vimeo'))
                            ->maxLength(255),
                        Forms\Components\TextInput::make('soundcloud')
                            ->label(__('SoundCloud'))
                            ->maxLength(255),
                        Forms\Components\TextInput::make('other')
                            ->label(__('Other'))
                            ->maxLength(255),
                    ])
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('youtube')
            ->columns([
                Tables\Columns\TextColumn::make('youtube')
                    ->label(__('YouTube')),
                Tables\Columns\TextColumn::make('vimeo')
                    ->label(__('Vimeo')),
                Tables\Columns\TextColumn::make('soundcloud')
                    ->label(__('SoundCloud')),
                Tables\Columns\TextColumn::make('other')
                    ->label(__('Other')),
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
