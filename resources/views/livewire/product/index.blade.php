<div class="py-12">
 
    <x-slot name="header">
    
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Products Index') }}
        </h2>
    </x-slot>

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="mb-4 flex w-full justify-end">
            <x-nav-link :href="route('product.create')">
                {{ __('Create New Product') }}
            </x-nav-link>
        </div>
        <x-table :items="$products" 
            :columns="[
                ['label' => 'Name', 'column' => 'name'],
                ['label' => 'Short Description', 'column' => 'short_description'],
                ]" edit="product.update" :delete="true" />
    </div>
   
</div>
