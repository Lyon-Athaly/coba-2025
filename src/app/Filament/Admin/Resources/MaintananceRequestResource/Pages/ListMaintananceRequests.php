<?php

namespace App\Filament\Admin\Resources\MaintananceRequestResource\Pages;

use App\Filament\Admin\Resources\MaintananceRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMaintananceRequests extends ListRecords
{
    protected static string $resource = MaintananceRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
