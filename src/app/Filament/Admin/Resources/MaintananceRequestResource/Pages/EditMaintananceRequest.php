<?php

namespace App\Filament\Admin\Resources\MaintananceRequestResource\Pages;

use App\Filament\Admin\Resources\MaintananceRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMaintananceRequest extends EditRecord
{
    protected static string $resource = MaintananceRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
