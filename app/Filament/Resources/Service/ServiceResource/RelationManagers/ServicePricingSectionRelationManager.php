<?php

namespace App\Filament\Resources\Service\ServiceResource\RelationManagers;

use App\Models\Other\Currency;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ServicePricingSectionRelationManager extends RelationManager
{
    protected static string $relationship = 'servicePricingSection';

    protected function calculatePrice($basePrice, $exchangeRate): float|int
    {
        return round($basePrice * $exchangeRate);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Fieldset::make(__('Pricing Section'))
                    ->schema([
                        Forms\Components\Section::make([
                            Forms\Components\Toggle::make('pricing_section_popular')
                                ->label(__('Popular')),
                        ]),
                        Forms\Components\Section::make([
                            Forms\Components\TextInput::make('pricing_section_price')
                                ->label(__('Price'))
                                ->numeric()
                                ->reactive(),
                            Forms\Components\Select::make('currency_id')
                                ->label(__('Currency'))
                                ->options(Currency::query()->pluck('code', 'id')->toArray()) // Використовуємо ID валюти
                                ->reactive()
                                ->afterStateUpdated(function ($state, callable $get, callable $set) {
                                    $currency = Currency::query()->find($state); // Знаходимо валюту по ID
                                    if ($currency) {
                                        // Отримуємо значення з поля 'pricing_section_price'
                                        $basePrice = $get('pricing_section_price');

                                        // Перевіряємо, щоб база ціни не була null або порожньою
                                        if ($basePrice !== null && $basePrice !== '') {
                                            $newPrice = $this->calculatePrice($basePrice, $currency->exchange_rate);
                                            $set('pricing_section_price', $newPrice);
                                        }
                                    }
                                }),
                            Forms\Components\TextInput::make('pricing_section_plan')
                                ->label(__('Plan'))
                                ->maxLength(255),

                            Forms\Components\TextInput::make('pricing_section_purchase_url')
                                ->label(__('Purchase URL'))
                                ->url(),
                        ])->columns(2),
                    ]),
                Forms\Components\Fieldset::make('Pricing items group')
                    ->schema([
                        Forms\Components\Repeater::make('pricingItems')
                            ->relationship('pricingItems')
                            ->schema([
                                Forms\Components\Toggle::make('item_is_active')
                                    ->label(__('Item is active'))
                                    ->required(),
                                Forms\Components\TextInput::make('item')
                                    ->label(__('Item'))
                                    ->required(),
                            ])
                            ->columns(2)
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('service_plan')
            ->columns([
                Tables\Columns\TextColumn::make('service_plan'),
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
