<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ItemResource\Pages;
use App\Filament\Resources\ItemResource\RelationManagers;
use App\Models\Item;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ItemResource extends Resource
{
    protected static ?string $model = Item::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $pluralModelLabel = 'Объекты';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make([
                    Forms\Components\TextInput::make('name')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('slug')
                        ->maxLength(255),
                    Forms\Components\Textarea::make('text'),
                    Forms\Components\TextInput::make('h1')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('meta_title')
                        ->maxLength(255),
                    Forms\Components\Textarea::make('meta_description')
                        ->maxLength(65535),
                    Forms\Components\TextInput::make('order')
                        ->required(),
                    Forms\Components\Toggle::make('active')
                        ->required(),
                    Forms\Components\TextInput::make('address')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('price')
                        ->required(),
                    Forms\Components\TextInput::make('rooms'),
                    Forms\Components\TextInput::make('floor'),
                    Forms\Components\TextInput::make('floors'),
                    Forms\Components\TextInput::make('total_area'),
                    Forms\Components\TextInput::make('living_space'),
                    Forms\Components\TextInput::make('kitchen_area'),
                    Forms\Components\TextInput::make('land_area'),
                    Forms\Components\TextInput::make('latitude'),
                    Forms\Components\TextInput::make('longitude'),
                    Forms\Components\TextInput::make('renovation')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('window-view')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('bathroom-unit')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('balcony')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('floor-covering')
                        ->maxLength(255),
                    Forms\Components\Toggle::make('room-furniture')
                        ->required(),
                    Forms\Components\Toggle::make('air-conditioner')
                        ->required(),
                    Forms\Components\Toggle::make('phone')
                        ->required(),
                    Forms\Components\TextInput::make('built-year'),
                    Forms\Components\TextInput::make('ceiling-height'),
                    Forms\Components\Toggle::make('guarded-building')
                        ->required(),
                    Forms\Components\Toggle::make('access-control-system')
                        ->required(),
                    Forms\Components\Toggle::make('lift')
                        ->required(),
                    Forms\Components\Toggle::make('rubbish-chute')
                        ->required(),
                    Forms\Components\Toggle::make('flat-alarm')
                        ->required(),
                    Forms\Components\Toggle::make('alarm')
                        ->required(),
                    Forms\Components\Toggle::make('toilet')
                        ->required(),
                    Forms\Components\Select::make('category_id')
                        ->relationship('category', 'name'),
                    Forms\Components\Select::make('user_id')
                        ->relationship('user', 'name'),
                    Forms\Components\Select::make('deal_type_id')
                        ->relationship('deal_type', 'name'),
                    Forms\Components\Select::make('item_type_id')
                        ->relationship('item_type', 'name'),
                    Forms\Components\TextInput::make('qd_id'),
                    Forms\Components\SpatieMediaLibraryFileUpload::make('image')
                        ->multiple()
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('image'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('category.name'),
                Tables\Columns\IconColumn::make('active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('address'),
                Tables\Columns\TextColumn::make('price'),
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
            'index' => Pages\ListItems::route('/'),
            'create' => Pages\CreateItem::route('/create'),
            'edit' => Pages\EditItem::route('/{record}/edit'),
        ];
    }
}
