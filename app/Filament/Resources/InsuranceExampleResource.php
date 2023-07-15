<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InsuranceExampleResource\Pages;
use App\Filament\Resources\InsuranceExampleResource\RelationManagers;
use App\Models\InsuranceExample;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InsuranceExampleResource extends Resource
{
    protected static ?string $model = InsuranceExample::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $pluralModelLabel = 'Примеры';

    protected static ?string $navigationGroup = 'Страхование';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make([
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\RichEditor::make('text')
                        ->required()
                        ->maxLength(65535),
                    Forms\Components\TextInput::make('price')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\SpatieMediaLibraryFileUpload::make('image')
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('text'),
                Tables\Columns\TextColumn::make('price'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
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
            'index' => Pages\ListInsuranceExamples::route('/'),
            'create' => Pages\CreateInsuranceExample::route('/create'),
            'edit' => Pages\EditInsuranceExample::route('/{record}/edit'),
        ];
    }
}
