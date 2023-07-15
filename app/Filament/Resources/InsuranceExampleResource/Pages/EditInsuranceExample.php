<?php

namespace App\Filament\Resources\InsuranceExampleResource\Pages;

use App\Filament\Resources\InsuranceExampleResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInsuranceExample extends EditRecord
{
    protected static string $resource = InsuranceExampleResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
