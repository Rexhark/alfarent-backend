<?php

namespace App\Filament\Resources\MobilResource\Pages;

use App\Filament\Resources\MobilResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMobil extends CreateRecord
{
    protected static string $resource = MobilResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
