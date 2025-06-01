<?php

namespace App\Filament\Resources\AbsensiFasilitatorResource\Pages;

use App\Filament\Resources\AbsensiFasilitatorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListAbsensiFasilitators extends ListRecords
{
    protected static string $resource = AbsensiFasilitatorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with('absensi.foto');
    }
}
