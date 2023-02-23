<div x-show="tab === 'skus'" class="flex w-full flex-col items-start gap-y-4 py-8">

    @foreach ($product->skus as $index => $sku)
        <div class="flex flex-row items-center gap-x-2" wire:key="sku-{{ $sku->id }}">

            <div class="w-2/3">
                <x-input-label for="sku" value="SKU" />
                <x-text-input wire:model="product.skus.{{ $index }}.sku" id="sku" type="text"
                    name="sku" class="mt-1 block w-full" />
                <x-input-error :messages="$errors->get('product.skus.'.$index.'sku')" class="mt-2" />
            </div>

            <div class="w-1/3">
                <x-input-label for="quantity" value="Quantity" />
                <x-text-input wire:model="product.skus.{{ $index }}.quantity" id="quantity" type="text"
                    name="quantity" class="mt-1 block w-full" />
                <x-input-error :messages="$errors->get('product.skus.'.$index.'quantity')" class="mt-2" />
            </div>
            <x-secondary-button wire:click="saveSku({{ $sku }})" class="mt-6 gap-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6">
                    <path
                        d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z" />
                    <path
                        d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z" />
                </svg>

                {{ __('Update') }}
            </x-secondary-button>
            <x-delete-button wire:click="removeSku({{ $sku }})" class="mt-6 gap-x-2"></x-delete-button>

        </div>
    @endforeach

    <div wire:loading.remove wire:target='"saveSku' class="flex flex-row items-center gap-x-2">
        <div class="w-2/3">
            <x-input-label for="sku" value="SKU" />
            <x-text-input wire:model="sku" id="sku" type="text" name="sku" class="mt-1 block w-full" />
            <x-input-error :messages="$errors->get('sku')" class="mt-2" />
        </div>
        <div class="w-1/3">
            <x-input-label for="quantity" value="Quantity" />
            <x-text-input wire:model="quantity" id="quantity" type="text" name="quantity"
                class="mt-1 block w-full" />
            <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
        </div>

        <x-secondary-button wire:click="saveSku" class="mt-6 gap-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-11.25a.75.75 0 00-1.5 0v2.5h-2.5a.75.75 0 000 1.5h2.5v2.5a.75.75 0 001.5 0v-2.5h2.5a.75.75 0 000-1.5h-2.5v-2.5z"
                    clip-rule="evenodd" />
            </svg>

            {{ __('Add') }}
        </x-secondary-button>
    </div>
</div>
