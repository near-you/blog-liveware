<?php

namespace App\Filament\Resources\Service\PricingResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PricingItemRelationManager extends RelationManager
{
    protected static string $relationship = 'pricingItem';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Fieldset::make(__('Pricing Item'))
                    ->schema([
                        Forms\Components\TextInput::make('item')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Toggle::make('item_is_active')
                            ->label(__('Item is active in Plan'))
                    ])->columns(1)
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('item')
            ->columns([
                Tables\Columns\TextColumn::make('item')
                    ->label(__('Item')),
                Tables\Columns\IconColumn::make('item_is_active')
                    ->label(__('Active'))
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->createAnother(false),
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
