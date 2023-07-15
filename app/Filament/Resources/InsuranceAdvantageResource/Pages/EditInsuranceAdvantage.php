<?php

namespace App\Filament\Resources\InsuranceAdvantageResource\Pages;

use App\Filament\Resources\InsuranceAdvantageResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInsuranceAdvantage extends EditRecord
{
    protected static string $resource = InsuranceAdvantageResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
