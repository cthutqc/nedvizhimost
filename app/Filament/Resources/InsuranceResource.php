<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InsuranceResource\Pages;
use App\Filament\Resources\InsuranceResource\RelationManagers;
use App\Models\Insurance;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InsuranceResource extends Resource
{
    protected static ?string $model = Insurance::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $pluralModelLabel = 'Страхование';

    protected static ?string $navigationGroup = 'Страхование';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make([
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('slug')
                        ->maxLength(255),
                    Forms\Components\RichEditor::make('text'),
                    Forms\Components\RichEditor::make('short_text'),
                    Forms\Components\RichEditor::make('error_text'),
                    Forms\Components\RichEditor::make('search_text'),
                    Forms\Components\RichEditor::make('example_text'),
                    Forms\Components\RichEditor::make('banner_one_text')
                        ->maxLength(255),
                    Forms\Components\RichEditor::make('banner_two_text')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('h1')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('meta_title')
                        ->maxLength(255),
                    Forms\Components\Textarea::make('meta_description')
                        ->maxLength(65535),
                    Forms\Components\SpatieMediaLibraryFileUpload::make('image'),
                    Forms\Components\SpatieMediaLibraryFileUpload::make('bio')
                        ->collection('bio'),
                    Forms\Components\SpatieMediaLibraryFileUpload::make('banner_one')
                        ->collection('banner_one'),
                    Forms\Components\SpatieMediaLibraryFileUpload::make('banner_two')
                        ->collection('banner_two'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListInsurances::route('/'),
            'create' => Pages\CreateInsurance::route('/create'),
            'edit' => Pages\EditInsurance::route('/{record}/edit'),
        ];
    }
}
