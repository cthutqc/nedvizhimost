<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InsuranceAdvantageResource\Pages;
use App\Filament\Resources\InsuranceAdvantageResource\RelationManagers;
use App\Models\InsuranceAdvantage;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InsuranceAdvantageResource extends Resource
{
    protected static ?string $model = InsuranceAdvantage::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $pluralModelLabel = 'Преимущества';

    protected static ?string $navigationGroup = 'Страхование';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make([
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\SpatieMediaLibraryFileUpload::make('image'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('image'),
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
            'index' => Pages\ListInsuranceAdvantages::route('/'),
            'create' => Pages\CreateInsuranceAdvantage::route('/create'),
            'edit' => Pages\EditInsuranceAdvantage::route('/{record}/edit'),
        ];
    }
}
