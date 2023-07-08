<?php

namespace App\Filament\Resources\MortgageResource\Pages;

use App\Filament\Resources\MortgageResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMortgage extends EditRecord
{
    protected static string $resource = MortgageResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
