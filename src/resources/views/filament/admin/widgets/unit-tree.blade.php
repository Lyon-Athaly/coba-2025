<x-filament-widgets::widget>
    <x-filament::section>

        <!-- @foreach($towers as $tower)
            <h3>{{ $tower->nama }}</h3>
            @foreach($tower->units->groupBy('lantai') as $lantai => $units)
                <p>Floor {{ $lantai }}</p>
                <ul>
                    @foreach($units as $unit)
                        <li>{{ $unit->unit_id }} ({{ $unit->status }})</li>
                    @endforeach
                </ul>
            @endforeach
        @endforeach -->


    </x-filament::section>
</x-filament-widgets::widget>
