<?php

namespace App\Filament\Admin\Resources\TowerResource\Pages;

use App\Filament\Admin\Resources\TowerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTower extends EditRecord
{
    protected static string $resource = TowerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
