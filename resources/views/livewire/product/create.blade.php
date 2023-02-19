<div class="py-12">

    <x-slot name="header">

        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Add Product') }}
        </h2>
    </x-slot>

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex w-full flex-col items-start gap-y-4 py-8">

                    <div class="w-full">
                        <x-input-label for="category" value="Category" />
                        <x-select-search
                            id="category_id"
                            type="text"
                            model="product.category_id"
                            key="name"
                            value="id"
                            searchable="search"
                            :items="$categories"
                        />
                        <x-input-error :messages="$errors->get('product.category_id')" class="mt-2" />
                    </div>

                    <div class="w-full">
                        <x-input-label for="name" value="Product name" />
                        <x-text-input wire:model="product.name" id="name" type="text" name="name"
                            class="mt-1 block w-full" />
                        <x-input-error :messages="$errors->get('product.name')" class="mt-2" />
                    </div>

                    <div class="w-full">
                        <x-input-label for="short_description" value="Short Description" />
                        <x-text-input wire:model="product.short_description" id="short_description" type="text"
                            name="short_description" class="mt-1 block w-full" />
                        <x-input-error :messages="$errors->get('product.short_description')" class="mt-2" />
                    </div>

                    <div class="w-full">
                        <x-input-label for="long_description" value="Long Description" />
                        <x-text-area wire:model="product.long_description" id="long_description" type="text"
                            name="long_description" class="mt-1 block w-full" />
                        <x-input-error :messages="$errors->get('product.long_description')" class="mt-2" />
                    </div>
                    <x-primary-button wire:loading.remove wire:target="save" wire:click="save" type="submit"
                        class="mt-4">
                        {{ __('Save') }}
                    </x-primary-button>

                    <x-primary-button wire:loading wire:target="save" type="button" class="mt-4">
                        <svg class="h-5 w-5 animate-spin text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                    </x-primary-button>
                </div>
            </div>
        </div>
    </div>
</div>
