<?php

namespace App\Filament\Resources\SimulationHistoryResource\Pages;

use App\Filament\Resources\SimulationHistoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSimulationHistory extends EditRecord
{
    protected static string $resource = SimulationHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
