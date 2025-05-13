<?php

namespace App\Filament\Resources\FasilitatorResource\Pages;

use App\Filament\Resources\FasilitatorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFasilitator extends EditRecord
{
    protected static string $resource = FasilitatorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
