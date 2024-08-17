<?php

namespace App\Filament\Resources\Service;

use App\Filament\Resources\Service\WhatIDoResource\Pages;
use App\Filament\Resources\Service\WhatIDoResource\RelationManagers;
use App\Models\Service\WhatIDo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WhatIDoResource extends Resource
{
    protected static ?string $model = WhatIDo::class;

    protected static ?string $navigationGroup = 'Service Page';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationLabel = 'What I Do';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Fieldset::make(__('What I Do'))
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label(__('Title'))
                            ->maxLength(255),
                        Forms\Components\RichEditor::make('body')
                            ->label(__('Text'))
                            ->columnSpanFull(),
                        Forms\Components\FileUpload::make('image')
                            ->image(),
                    ])->columns(1)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
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
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageWhatIDos::route('/'),
        ];
    }
}
