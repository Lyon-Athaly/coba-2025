<?php

namespace App\Filament\Admin\Resources\OccupancyResource\Pages;

use App\Filament\Admin\Resources\OccupancyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOccupancies extends ListRecords
{
    protected static string $resource = OccupancyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
