<?php

namespace App\Filament\Adoptee\Resources\AnimalResource\Pages;

use App\Filament\Adoptee\Resources\AnimalResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAnimal extends CreateRecord
{
    protected static string $resource = AnimalResource::class;
}
