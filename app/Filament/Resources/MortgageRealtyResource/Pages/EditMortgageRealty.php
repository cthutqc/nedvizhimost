<?php

namespace App\Filament\Resources\MortgageRealtyResource\Pages;

use App\Filament\Resources\MortgageRealtyResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMortgageRealty extends EditRecord
{
    protected static string $resource = MortgageRealtyResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
