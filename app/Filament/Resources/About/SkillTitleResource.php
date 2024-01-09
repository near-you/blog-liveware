<?php

namespace App\Filament\Resources\About;

use App\Filament\Resources\About;
use App\Models\About\SkillTitle;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SkillTitleResource extends Resource
{
    protected static ?string $model = SkillTitle::class;

    protected static ?string $navigationGroup = 'About Page';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationLabel = 'Skill';

    protected static ?string $navigationIcon = 'heroicon-o-arrow-up-on-square-stack';

    // protected static ?string $activeNavigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label(__('Skill Title'))
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label(__('Skill Title'))
                    ->searchable(),

                Tables\Columns\TextColumn::make('skill.title')
                    ->label(__('Skill'))
                    ->searchable(),

//                Tables\Columns\TextColumn::make('skill.skill_percent')
//                    ->label(__('Percent'))
//                    ->searchable(),

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
            ]);
    }

    public static function getRelations(): array
    {
        return [
            About\SkillTitleResource\RelationManagers\SkillRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => About\SkillTitleResource\Pages\ListSkillTitles::route('/'),
            'create' =>  About\SkillTitleResource\Pages\CreateSkillTitle::route('/create'),
            'edit' => About\SkillTitleResource\Pages\EditSkillTitle::route('/{record}/edit'),
        ];
    }
}
