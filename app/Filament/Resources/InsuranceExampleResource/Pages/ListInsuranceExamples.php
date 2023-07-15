<?php

namespace App\Filament\Resources\InsuranceExampleResource\Pages;

use App\Filament\Resources\InsuranceExampleResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInsuranceExamples extends ListRecords
{
    protected static string $resource = InsuranceExampleResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
