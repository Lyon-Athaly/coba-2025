use App\Models\Tower;
use App\Models\Unit;
use Illuminate\Foundation\Testing\RefreshDatabase;
uses(RefreshDatabase::class);

// filepath: src/resources/views/filament/admin/widgets/unit-tree.bladeTest.php

<?php



test('unit tree renders correctly', function () {
    // Arrange: Create mock data for Towers and Units
    $towerA = Tower::create(['tower_id' => 'A', 'jumlah_lantai' => 2, 'jumlah_unit' => 6]);
    $towerB = Tower::create(['tower_id' => 'B', 'jumlah_lantai' => 3, 'jumlah_unit' => 9]);

    Unit::create(['unit_id' => 'T1-L1-U1', 'lantai' => 1, 'status' => 'tersedia', 'tower_id' => $towerA->id]);
    Unit::create(['unit_id' => 'T1-L1-U2', 'lantai' => 1, 'status' => 'tidak tersedia', 'tower_id' => $towerA->id]);
    Unit::create(['unit_id' => 'T1-L2-U1', 'lantai' => 2, 'status' => 'tersedia', 'tower_id' => $towerA->id]);

    Unit::create(['unit_id' => 'T2-L1-U1', 'lantai' => 1, 'status' => 'tersedia', 'tower_id' => $towerB->id]);
    Unit::create(['unit_id' => 'T2-L2-U1', 'lantai' => 2, 'status' => 'tidak tersedia', 'tower_id' => $towerB->id]);
    Unit::create(['unit_id' => 'T2-L3-U1', 'lantai' => 3, 'status' => 'tersedia', 'tower_id' => $towerB->id]);

    // Act: Render the widget view
    $view = view('filament.admin.widgets.unit-tree', [
        'towers' => Tower::with(['units' => function ($query) {
            $query->orderBy('lantai')->orderBy('unit_id');
        }])->get(),
    ])->render();

    // Assert: Check if the rendered view contains the expected structure
    expect($view)->toContain('<h3>A</h3>');
    expect($view)->toContain('<p>Floor 1</p>');
    expect($view)->toContain('<li>T1-L1-U1 (tersedia)</li>');
    expect($view)->toContain('<li>T1-L1-U2 (tidak tersedia)</li>');
    expect($view)->toContain('<p>Floor 2</p>');
    expect($view)->toContain('<li>T1-L2-U1 (tersedia)</li>');

    expect($view)->toContain('<h3>B</h3>');
    expect($view)->toContain('<p>Floor 1</p>');
    expect($view)->toContain('<li>T2-L1-U1 (tersedia)</li>');
    expect($view)->toContain('<p>Floor 2</p>');
    expect($view)->toContain('<li>T2-L2-U1 (tidak tersedia)</li>');
    expect($view)->toContain('<p>Floor 3</p>');
    expect($view)->toContain('<li>T2-L3-U1 (tersedia)</li>');
});