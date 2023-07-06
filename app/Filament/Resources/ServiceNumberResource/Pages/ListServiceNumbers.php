<?php

namespace App\Filament\Resources\ServiceNumberResource\Pages;

use App\Filament\Resources\ServiceNumberResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListServiceNumbers extends ListRecords
{
    protected static string $resource = ServiceNumberResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
