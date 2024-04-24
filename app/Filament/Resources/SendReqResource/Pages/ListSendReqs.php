<?php

namespace App\Filament\Resources\SendReqResource\Pages;

use App\Filament\Resources\SendReqResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSendReqs extends ListRecords
{
    protected static string $resource = SendReqResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
