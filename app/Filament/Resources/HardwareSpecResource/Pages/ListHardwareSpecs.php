<?php

namespace App\Filament\Resources\HardwareSpecResource\Pages;

use App\Filament\Resources\HardwareSpecResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHardwareSpecs extends ListRecords
{
    protected static string $resource = HardwareSpecResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
