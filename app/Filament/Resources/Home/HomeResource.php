<?php

namespace App\Filament\Resources\Home;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Home\Home;
use Filament\Tables\Table;
use App\Events\ImageDeleted;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Event;
use App\Filament\Resources\Home\HomeResource\Pages;

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
                Forms\Components\Fieldset::make(__('Name'))
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label(__('First Name'))
                            ->required()
                            ->maxLength(120),

                        Forms\Components\TextInput::make('surname')
                            ->label(__('Second Name'))
                            ->required()
                            ->maxLength(120),
                    ]),

                Forms\Components\Fieldset::make(__('Description'))
                    ->schema([
                        Forms\Components\Textarea::make('short_description')
                            ->label(__('Your short description'))
                            ->maxLength(2048)
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Fieldset::make('attachments')
                    ->label(__('Image'))
                    ->relationship('attachments')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->label(__('Upload Image'))
                            ->required()
                            ->columnSpanFull()
                            ->image()
                            ->directory('images')
                            ->imageEditor()
                    //                          ->imageEditorMode(1)
                            ->uploadingMessage('Uploading image...')
                            ->imageEditorAspectRatios([
                                null,
                                '16:9',
                                '4:3',
                                '1:1',
                            ])
                            ->deleteUploadedFileUsing(function ($file) {
                                Event::dispatch(new ImageDeleted($file));
                            }),
                    ]),

                Forms\Components\Fieldset::make(__('Social network links'))
                    ->schema([
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
                    ]),

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
                // Tables\Columns\ImageColumn::make('homeImage')
                //     ->label(__('Image')),
                Tables\Columns\ImageColumn::make('attachments.image')
                    ->label(__('Image')),

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
