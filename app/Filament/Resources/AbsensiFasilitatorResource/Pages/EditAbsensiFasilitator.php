<?php

namespace App\Filament\Resources\AbsensiFasilitatorResource\Pages;

use App\Filament\Resources\AbsensiFasilitatorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAbsensiFasilitator extends EditRecord
{
    protected static string $resource = AbsensiFasilitatorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
