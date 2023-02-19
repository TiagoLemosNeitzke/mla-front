<div class="py-12">
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Add Category') }}
        </h2>
    </x-slot>

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-md sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <form wire:submit.prevent="save">
                    <div>
                        <div class="w-full">
                            <x-input-label for="name" value="Category name" />
                            <x-text-input wire:model="category.name" id="name" type="text" name="nome"
                                class="mt-1 block w-full" />
                            <x-input-error :messages="$errors->get('category.name')" class="mt-2"/>
                        </div>
                    </div>

                    <x-primary-button type="submit" class="mt-4">
                        Save
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</div>