<?php

namespace App\Filament\Resources\ActionVariantResource\Pages;

use App\Filament\Resources\ActionVariantResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditActionVariant extends EditRecord
{
    protected static string $resource = ActionVariantResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
