<?php

namespace App\Filament\Resources\FasilitatorResource\Pages;

use App\Filament\Resources\FasilitatorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFasilitators extends ListRecords
{
    protected static string $resource = FasilitatorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
