<?php

namespace App\Filament\Resources\ServiceJobResource\Pages;

use App\Filament\Resources\ServiceJobResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListServiceJobs extends ListRecords
{
    protected static string $resource = ServiceJobResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
