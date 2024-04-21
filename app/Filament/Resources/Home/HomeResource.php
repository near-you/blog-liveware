<?php

namespace App\Filament\Resources\Home;

use App\Filament\Resources\Home\HomeResource\Pages;
use App\Filament\Resources\Home\HomeResource\RelationManagers;
use App\Models\Home\Home;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class HomeResource extends Resource
{
    protected static ?string $model = Home::class;

    protected static ?string $navigationGroup = 'Home Page';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationLabel = 'Home';

    protected static ?string $navigationIcon = 'heroicon-o-user';

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
                    ->image()
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:3',
                        '1:1',
                    ]),

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
                    ->label(__('Name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('surname')
                    ->label(__('Surname'))
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('Created'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('Updated'))
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
