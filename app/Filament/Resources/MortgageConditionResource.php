<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MortgageConditionResource\Pages;
use App\Filament\Resources\MortgageConditionResource\RelationManagers;
use App\Models\MortgageCondition;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MortgageConditionResource extends Resource
{
    protected static ?string $model = MortgageCondition::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $pluralModelLabel = 'Условия';

    protected static ?string $navigationGroup = 'Ипотека';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make([
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->maxLength(255),
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
            'index' => Pages\ListMortgageConditions::route('/'),
            'create' => Pages\CreateMortgageCondition::route('/create'),
            'edit' => Pages\EditMortgageCondition::route('/{record}/edit'),
        ];
    }
}
