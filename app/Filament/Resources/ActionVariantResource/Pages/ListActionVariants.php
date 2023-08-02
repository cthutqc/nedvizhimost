<?php

namespace App\Filament\Resources\ActionVariantResource\Pages;

use App\Filament\Resources\ActionVariantResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListActionVariants extends ListRecords
{
    protected static string $resource = ActionVariantResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
