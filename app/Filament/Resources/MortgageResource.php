<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MortgageResource\Pages;
use App\Filament\Resources\MortgageResource\RelationManagers;
use App\Models\Mortgage;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MortgageResource extends Resource
{
    protected static ?string $model = Mortgage::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $pluralModelLabel = 'Ипотека';

    protected static ?string $navigationGroup = 'Ипотека';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make([
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Select::make('service_id')
                        ->relationship('service', 'name'),
                    Forms\Components\Textarea::make('text')
                        ->maxLength(65535),
                    Forms\Components\Toggle::make('active')
                        ->default(true),
                    Forms\Components\TextInput::make('order')
                        ->default(0),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\IconColumn::make('active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('order'),
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
            RelationManagers\MortgageConditionsRelationManager::class,
            RelationManagers\MortgageRealtiesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMortgages::route('/'),
            'create' => Pages\CreateMortgage::route('/create'),
            'edit' => Pages\EditMortgage::route('/{record}/edit'),
        ];
    }
}
