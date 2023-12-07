<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HomeResource\Pages;
use App\Filament\Resources\HomeResource\RelationManagers;
use App\Models\Home;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HomeResource extends Resource
{
    protected static ?string $model = Home::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Profile Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(120),
                Forms\Components\TextInput::make('surname')
                    ->required()
                    ->maxLength(120),
                Forms\Components\Textarea::make('short_description')
                    ->maxLength(2048)
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('image')
                    ->image(),
                Forms\Components\TextInput::make('facebook_link')
                    ->maxLength(255)
                    ->name('Facebook Link')
                ->default('Facebook'),
                Forms\Components\TextInput::make('twitter_link')
                    ->maxLength(255),
                Forms\Components\TextInput::make('behance_link')
                    ->maxLength(255),
                Forms\Components\TextInput::make('linkedin_link')
                    ->maxLength(255),
                Forms\Components\TextInput::make('instagram_link')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->name('Name'),
                Tables\Columns\TextColumn::make('surname')
                    ->searchable()
                    ->name('Surname'),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('facebook_link')
                    ->searchable()
                    ->name('Facebook Link'),
                Tables\Columns\TextColumn::make('twitter_link')
                    ->searchable(),
                Tables\Columns\TextColumn::make('behance_link')
                    ->searchable(),
                Tables\Columns\TextColumn::make('linkedin_link')
                    ->searchable(),
                Tables\Columns\TextColumn::make('instagram_link')
                    ->searchable(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHomes::route('/'),
            'create' => Pages\CreateHome::route('/create'),
            'edit' => Pages\EditHome::route('/{record}/edit'),
        ];
    }
}
