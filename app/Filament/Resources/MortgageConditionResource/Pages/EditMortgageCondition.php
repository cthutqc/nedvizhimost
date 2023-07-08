<?php

namespace App\Filament\Resources\MortgageConditionResource\Pages;

use App\Filament\Resources\MortgageConditionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMortgageCondition extends EditRecord
{
    protected static string $resource = MortgageConditionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
