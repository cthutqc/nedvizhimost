<?php

namespace App\Filament\Resources\UserPositionResource\Pages;

use App\Filament\Resources\UserPositionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUserPositions extends ListRecords
{
    protected static string $resource = UserPositionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
