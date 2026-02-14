<?php

namespace App\Filament\Resources\HardwareSpecResource\Pages;

use App\Filament\Resources\HardwareSpecResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHardwareSpec extends EditRecord
{
    protected static string $resource = HardwareSpecResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
