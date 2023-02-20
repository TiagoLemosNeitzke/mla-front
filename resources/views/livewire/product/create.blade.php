<div class="py-12">

    <x-slot name="header">

        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Add Product') }}
        </h2>
    </x-slot>

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">

                <div x-data="{ tab: 'general' }">
                    <div class="lg:hidden">
                        <label for="tabs" class="sr-only">
                            {{ __('Select a tab') }}
                        </label>
                        <select x-model="tab" name="tabs" id="tabs"
                            class="block w-full rounded-md border-gray-300 py-4">
                            <option value="general">{{ __('General') }}</option>
                            <option value="photos" @disabled(!$product->id)>{{ __('Photos') }}</option>
                            <option value="skus" @disabled(!$product->id)>{{ __('Skus') }}</option>
                        </select>
                    </div>


                    <div class="hidden sm:block">
                        <div class="border-b border-gray-200">
                            <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                                <a x-on:click="tab = 'general'"
                                    class="cursor-pointer whitespace-nowrap border-b-2 py-4 px-1 text-sm font-medium"
                                    :class="{
                                        'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': tab !==
                                            'general',
                                        'border-indigo-500 text-indigo-600': tab == 'general'
                                    }">
                                    {{ __('General') }}
                                </a>

                                <a @if ($product->id) x-on:click="tab = 'photos'" @endif
                                    class="cursor-pointer whitespace-nowrap border-b-2 py-4 px-1 text-sm font-medium"
                                    :class="{
                                        'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': tab !==
                                            'photos',
                                        'border-indigo-500 text-indigo-600': tab === 'photos'
                                    }">
                                    {{ __('Photos') }}
                                </a>

                                <a @if ($product->id) x-on:click="tab = 'skus'" @endif
                                    class="cursor-pointer whitespace-nowrap border-b-2 py-4 px-1 text-sm font-medium"
                                    :class="{
                                        'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': tab !==
                                            'skus',
                                        'border-indigo-500 text-indigo-600': tab === 'skus'
                                    }">
                                    {{ __('Skus') }}
                                </a>
                            </nav>
                        </div>
                    </div>
                    @include('livewire.product.includes.general')
                    @include('livewire.product.includes.photos')
                </div>
            </div>
        </div>
    </div>
</div>
