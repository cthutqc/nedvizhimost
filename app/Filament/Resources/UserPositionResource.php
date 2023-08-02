<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserPositionResource\Pages;
use App\Filament\Resources\UserPositionResource\RelationManagers;
use App\Models\UserPosition;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserPositionResource extends Resource
{
    protected static ?string $model = UserPosition::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $pluralLabel = 'Должность';

    protected static ?string $navigationGroup = 'Пользователи';

    protected static ?int $navigationSort = 2;

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
            'index' => Pages\ListUserPositions::route('/'),
            'create' => Pages\CreateUserPosition::route('/create'),
            'edit' => Pages\EditUserPosition::route('/{record}/edit'),
        ];
    }
}
