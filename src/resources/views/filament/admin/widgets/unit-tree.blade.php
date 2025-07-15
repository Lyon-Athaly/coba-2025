<div class="w-full max-w-full px-0 mx-0">
    <x-filament-widgets::widget class="!w-full !max-w-full px-0">
        <x-filament::section class="!w-full !max-w-full px-0">

            @foreach ($towers as $tower)
                <div x-data="{ open: true }">
                    <x-filament::card class="mb-6 w-full">
                        <div class="flex justify-between items-center mb-2">
                            <h2 class="text-lg font-bold">Tower {{ $tower->tower_id }}</h2>
                            <button
                                type="button"
                                class="text-xs text-blue-600 hover:underline"
                                @click="open = !open"
                                x-text="open ? 'Sembunyikan' : 'Tampilkan'"
                            ></button>
                        </div>

                        <div x-show="open" x-transition class="w-full">
                            <div class="w-full overflow-x-auto">
                                <div class="flex flex-wrap justify-between gap-x-2 gap-y-3">
                                    @foreach ($tower->units->sortBy('lantai')->sortBy('unit_id') as $unit)
                                        <a 
                                            href="{{ route('filament.admin.resources.units.edit', $unit->id) }}"
                                            class="flex flex-col items-center justify-center bg-gray-100 rounded-md px-4 py-2 shadow-sm w-[240px] max-w-[240px] hover:bg-blue-100 transition-all no-underline"
                                        >
                                            <div class="font-semibold text-sm text-blue-700">{{ $unit->unit_id }}</div>
                                            <div class="text-xs text-gray-600">Lantai {{ str_pad($unit->lantai, 2, '0', STR_PAD_LEFT) }}</div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </x-filament::card>
                </div>
            @endforeach


        </x-filament::section>
    </x-filament-widgets::widget>
</div>
