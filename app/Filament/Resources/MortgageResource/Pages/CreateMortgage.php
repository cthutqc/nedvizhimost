<?php

namespace App\Filament\Resources\MortgageResource\Pages;

use App\Filament\Resources\MortgageResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMortgage extends CreateRecord
{
    protected static string $resource = MortgageResource::class;
}
