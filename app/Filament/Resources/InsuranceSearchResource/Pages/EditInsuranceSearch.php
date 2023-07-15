<?php

namespace App\Filament\Resources\InsuranceSearchResource\Pages;

use App\Filament\Resources\InsuranceSearchResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInsuranceSearch extends EditRecord
{
    protected static string $resource = InsuranceSearchResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
