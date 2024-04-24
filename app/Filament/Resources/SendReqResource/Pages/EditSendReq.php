<?php

namespace App\Filament\Resources\SendReqResource\Pages;

use App\Filament\Resources\SendReqResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSendReq extends EditRecord
{
    protected static string $resource = SendReqResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
