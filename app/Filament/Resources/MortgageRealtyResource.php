<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MortgageRealtyResource\Pages;
use App\Filament\Resources\MortgageRealtyResource\RelationManagers;
use App\Models\MortgageRealty;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MortgageRealtyResource extends Resource
{
    protected static ?string $model = MortgageRealty::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $pluralModelLabel = 'Что можно купить';

    protected static ?string $navigationGroup = 'Ипотека';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make([
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->maxLength(255),
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
            'index' => Pages\ListMortgageRealties::route('/'),
            'create' => Pages\CreateMortgageRealty::route('/create'),
            'edit' => Pages\EditMortgageRealty::route('/{record}/edit'),
        ];
    }
}
