<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InsuranceSearchResource\Pages;
use App\Filament\Resources\InsuranceSearchResource\RelationManagers;
use App\Models\InsuranceSearch;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InsuranceSearchResource extends Resource
{
    protected static ?string $model = InsuranceSearch::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $pluralModelLabel = 'Подбор';

    protected static ?string $navigationGroup = 'Страхование';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make([
                    Forms\Components\RichEditor::make('text')
                        ->required()
                        ->maxLength(65535),
                    Forms\Components\SpatieMediaLibraryFileUpload::make('image')
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('text'),
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
            'index' => Pages\ListInsuranceSearches::route('/'),
            'create' => Pages\CreateInsuranceSearch::route('/create'),
            'edit' => Pages\EditInsuranceSearch::route('/{record}/edit'),
        ];
    }
}
