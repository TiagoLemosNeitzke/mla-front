<div class="py-12">
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Category Index') }}
        </h2>
    </x-slot>

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="mb-4 flex w-full justify-end">
            <x-nav-link :href="route('category.create')">
                {{ __('Create New Category') }}
            </x-nav-link>
        </div>
        <x-table :items="$categories" :columns="[['label' => 'Name', 'column' => 'name']]" edit="category.update" :delete="true"/>
    </div>
</div>