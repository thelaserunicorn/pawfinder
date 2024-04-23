<?php

namespace App\Filament\Resources\SheltersResource\Pages;

use App\Filament\Resources\SheltersResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListShelters extends ListRecords
{
    protected static string $resource = SheltersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
