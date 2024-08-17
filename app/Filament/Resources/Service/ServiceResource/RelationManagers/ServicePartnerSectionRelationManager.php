<?php

namespace App\Filament\Resources\Service\ServiceResource\RelationManagers;

use App\Events\ImageDeleted;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\RelationManagers\RelationManager;
use Illuminate\Support\Facades\Event;

class ServicePartnerSectionRelationManager extends RelationManager
{
    protected static string $relationship = 'servicePartnerSection';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Fieldset::make(__('Partner Section'))
                    ->schema([
//                        Forms\Components\Section::make()
//                            ->schema([
//                                Forms\Components\Toggle::make('is_active')
//                                    ->required()
//                                    ->label(__('Is Active')),
//                            ]),

                        Forms\Components\Fieldset::make(__('Partner Information'))
                            ->schema([
                                Forms\Components\TextInput::make('partner_company_name')
                                    ->label(__('Company Name')),


                                Forms\Components\TextInput::make('partner_website_url')
                                    ->label(__('Partner Website Url'))
                                    ->url()
                                    ->suffixIcon('heroicon-m-globe-alt')
//                                    ->suffixIconColor('success')
                            ]),

                        Forms\Components\Fieldset::make('attachments')
                            ->label(__('Image'))
                            ->relationship('attachments')
                            ->schema([
                                Forms\Components\FileUpload::make('image_url')
                                    ->label(__('Upload Image'))
                                    ->required()
                                    ->columnSpanFull()
                                    ->image()
                                    ->directory('images/service-partner-section')
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

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('is_active')
            ->columns([
//                Tables\Columns\IconColumn::make('is_active')
//                    ->label(__('Is Active'))
//                    ->boolean(),

                Tables\Columns\TextColumn::make('partner_company_name')
                    ->label(__('Company Name')),

                Tables\Columns\TextColumn::make('partner_website_url')
                    ->label(__('Partner Website Url')),
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
//                    ->before(function ($record) {
//                        if ($record->attachments) {
//                            Storage::delete('public/' . $record->attachments->image_url);
//                        }
//                    }),
//                    ->visible(fn() => ServicePartnerSection::count() < 1),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
