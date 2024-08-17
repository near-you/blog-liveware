<?php

namespace App\Filament\Resources\Service\ServiceResource\RelationManagers;

use App\Events\ImageDeleted;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Event;

class ServiceWhatIDoSectionRelationManager extends RelationManager
{
    protected static string $relationship = 'serviceWhatIDoSection';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Fieldset::make(__('What I Do Section'))
                    ->schema([
                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\Toggle::make('is_active')
                                    ->label(__('Is Active'))
                                    ->required(),
                            ]),

                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->label(__('Title'))
                                    ->maxLength(255)
                                    ->columnSpanFull(),

                                Forms\Components\RichEditor::make('description')
                                    ->label(__('Your Text'))
                                    ->columnSpanFull(),
                            ]),

                        Forms\Components\Section::make()
                            ->relationship('attachments')
                            ->schema([
                                Forms\Components\Grid::make(1)
                                    ->schema([
                                        Forms\Components\FileUpload::make('image_url')
                                            ->label(__('Upload Image'))
                                            ->required()
//                                            ->columnSpanFull()
                                            ->image()
                                            ->directory('images/service-what-i-do-section')
                                            ->imageEditor()
                                            ->imageEditorMode(2)
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
                            ]),
                    ]),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('is_active')
            ->columns([
                Tables\Columns\IconColumn::make('is_active')
                    ->label(__('Active'))
                    ->boolean(),

                Tables\Columns\TextColumn::make('title')
                    ->label(__('Title')),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('Created At'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('Updated At'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
