<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InsuranceErrorResource\Pages;
use App\Filament\Resources\InsuranceErrorResource\RelationManagers;
use App\Models\InsuranceError;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InsuranceErrorResource extends Resource
{
    protected static ?string $model = InsuranceError::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $pluralModelLabel = 'Ошибки';

    protected static ?string $navigationGroup = 'Страхование';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make([
                    Forms\Components\Textarea::make('text')
                        ->required()
                        ->maxLength(65535),
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
            'index' => Pages\ListInsuranceErrors::route('/'),
            'create' => Pages\CreateInsuranceError::route('/create'),
            'edit' => Pages\EditInsuranceError::route('/{record}/edit'),
        ];
    }
}
