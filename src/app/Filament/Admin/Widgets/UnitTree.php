<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\Widget;

class UnitTree extends Widget
{
    protected static string $view = 'filament.admin.widgets.unit-tree';

    public function getViewData(): array
    {
        return [
            'towers' => \App\Models\Tower::with(['units' => function ($query) {
                $query->orderBy('lantai')->orderBy('unit_id');
            }])->get(),
        ];
    }
}
