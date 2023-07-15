<?php

namespace App\Filament\Resources\InsuranceFaqResource\Pages;

use App\Filament\Resources\InsuranceFaqResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInsuranceFaqs extends ListRecords
{
    protected static string $resource = InsuranceFaqResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
