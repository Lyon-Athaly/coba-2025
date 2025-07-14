<?php

namespace App\Filament\Admin\Resources\TowerResource\Pages;

use App\Filament\Admin\Resources\TowerResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTower extends CreateRecord
{
    protected static string $resource = TowerResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['jumlah_unit'] = 30 * (int) $data['jumlah_lantai'];

        return $data;
    }
    }
