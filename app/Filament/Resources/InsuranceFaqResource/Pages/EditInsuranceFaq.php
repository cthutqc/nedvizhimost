<?php

namespace App\Filament\Resources\InsuranceFaqResource\Pages;

use App\Filament\Resources\InsuranceFaqResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInsuranceFaq extends EditRecord
{
    protected static string $resource = InsuranceFaqResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
