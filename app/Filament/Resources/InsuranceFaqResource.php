<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InsuranceFaqResource\Pages;
use App\Filament\Resources\InsuranceFaqResource\RelationManagers;
use App\Models\InsuranceFaq;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InsuranceFaqResource extends Resource
{
    protected static ?string $model = InsuranceFaq::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';


    protected static ?string $pluralModelLabel = 'Вопрос ответ';

    protected static ?string $navigationGroup = 'Страхование';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make([
                    Forms\Components\Textarea::make('question')
                        ->required()
                        ->maxLength(65535),
                    Forms\Components\RichEditor::make('answer')
                        ->required()
                        ->maxLength(65535),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('question'),
                Tables\Columns\TextColumn::make('answer'),
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
            'index' => Pages\ListInsuranceFaqs::route('/'),
            'create' => Pages\CreateInsuranceFaq::route('/create'),
            'edit' => Pages\EditInsuranceFaq::route('/{record}/edit'),
        ];
    }
}
