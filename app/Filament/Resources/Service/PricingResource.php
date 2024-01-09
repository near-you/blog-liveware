<?php

namespace App\Filament\Resources\Service;

use App\Filament\Resources\Service\PricingResource\Pages;
use App\Filament\Resources\Service\PricingResource\RelationManagers;
use App\Models\Service\Pricing;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PricingResource extends Resource
{
    protected static ?string $model = Pricing::class;

    protected static ?string $navigationGroup = 'Service Page';

    protected static ?int $navigationSort = 6;

    protected static ?string $navigationLabel = 'Pricing';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('price')
                    ->label(__('Price'))
                    ->required()
                    ->maxLength(255),

                Select::make('currency')
                    ->label(__('Currency'))
                    ->required()
                    ->options([
                        '$' => 'USD (American Dollar)',
                        '€' => 'EUR (Euro)',
                        '₴' => 'HRN (Ukraine Hryvna)',
                    ]),

                Forms\Components\TextInput::make('plan')
                    ->label(__('Plan'))
                    ->required()
                    ->maxLength(255),

                Forms\Components\Toggle::make('popular')
                    ->label(__('Popular'))
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('price')
                    ->searchable(),
                Tables\Columns\TextColumn::make('currency')
                    ->searchable(),
                Tables\Columns\TextColumn::make('plan')
                    ->searchable(),
                Tables\Columns\IconColumn::make('popular')
                    ->boolean(),
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
            RelationManagers\PricingItemRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPricings::route('/'),
            'create' => Pages\CreatePricing::route('/create'),
            'edit' => Pages\EditPricing::route('/{record}/edit'),
        ];
    }
}
