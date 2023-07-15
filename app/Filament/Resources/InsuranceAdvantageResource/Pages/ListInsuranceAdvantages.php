<?php

namespace App\Filament\Resources\InsuranceAdvantageResource\Pages;

use App\Filament\Resources\InsuranceAdvantageResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInsuranceAdvantages extends ListRecords
{
    protected static string $resource = InsuranceAdvantageResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
