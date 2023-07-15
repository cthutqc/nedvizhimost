<?php

namespace App\Filament\Resources\InsuranceErrorResource\Pages;

use App\Filament\Resources\InsuranceErrorResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInsuranceErrors extends ListRecords
{
    protected static string $resource = InsuranceErrorResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
