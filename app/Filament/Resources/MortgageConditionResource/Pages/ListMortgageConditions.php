<?php

namespace App\Filament\Resources\MortgageConditionResource\Pages;

use App\Filament\Resources\MortgageConditionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMortgageConditions extends ListRecords
{
    protected static string $resource = MortgageConditionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
