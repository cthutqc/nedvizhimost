<?php

namespace App\Filament\Resources\InsuranceErrorResource\Pages;

use App\Filament\Resources\InsuranceErrorResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInsuranceError extends EditRecord
{
    protected static string $resource = InsuranceErrorResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
