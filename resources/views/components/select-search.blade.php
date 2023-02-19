<div x-data="{ open: false }">
    <div class="flex flex-col justify-between lg:relative">
        <div class="relative flex flex-row items-center" x-on:click="open = ! open">
            <x-text-input wire:model.debounce.500ms="{{ $searchable }}" class="mt-1 block w-full cursor-pointer pr-8"
                type="text" />

            <svg x-bind:class="open ? 'rotate-180' : 'rotate-0'" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor"
                class="absolute right-3 mt-2 h-4 w-4 cursor-pointer text-gray-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
        </div>

        <div x-show="open" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-90"
            class="absolute top-0 left-0 flex h-screen w-full flex-col overflow-y-auto bg-white px-2 py-2 lg:top-14 lg:h-auto lg:max-h-[150px] lg:rounded-lg lg:border lg:border-gray-300 lg:shadow-lg">

            <div class="mb-4 flex w-full flex-col lg:hidden">
                <div class="flex flex-row justify-end">
                    <button class="transform rounded-full p-2 hover:shadow-lg active:scale-90"
                        x-on:click="open = false">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>

                    <div class="relative flex flex-row items-center" x-on:click="open = ! open">
                        <x-text-input wire:model.debounce.500ms="{{ $searchable }}"
                            class="mt-1 block w-full cursor-pointer pr-8" type="text" />

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                            stroke="currentColor" class="absolute right-3 mt-2 h-4 w-4 cursor-pointer text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>

                    </div>
                </div>
            </div>

            <div class="flex flex-col divide-x divide-dotted divide-gray-900">
                @if ($items->count() === 0)
                    <button
                        class="flex w-full transform flex-row justify-start py-4 hover:opacity-80 active:opacity-40">
                        {{ __('No item') }}
                    </button>
                @endif
            </div>

            <div wire:loading wire:target="search" class="flex w-full h-full items-center justify-start">
                @foreach ($items as $item)
                    <div class="p-4 w-full mx-auto">
                        <div class="animate-pulse flex space-x-4">
                            <div class="flex-1 space-y-1 py-1">
                                <div class="h-2 bg-slate-700 rounded"></div>
                                <div class="grid grid-cols-3 gap-1">
                                    <div class="h-2 bg-slate-700 rounded col-span-2"></div>
                                    <div class="h-2 bg-slate-700 rounded col-span-1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @foreach ($items as $item)
                <button wire:loading.remove wire:target="{{ $searchable }}"
                    x-on:click="
                    $wire.set('{{ $model }}', '{{ data_get($item, $value) }}');
                    $wire.set('{{ $searchable }}', '{{ data_get($item, $key) }}');
                    open = false;
                    "
                    class="flex w-full transform flex-row justify-start py-2 hover:opacity-80 active:opacity-40">
                    {{ data_get($item, $key) }}
                </button>
            @endforeach
        </div>
    </div>
</div>
