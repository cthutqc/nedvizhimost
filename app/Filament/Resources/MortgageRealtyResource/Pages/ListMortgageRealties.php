<?php

namespace App\Filament\Resources\MortgageRealtyResource\Pages;

use App\Filament\Resources\MortgageRealtyResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMortgageRealties extends ListRecords
{
    protected static string $resource = MortgageRealtyResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
