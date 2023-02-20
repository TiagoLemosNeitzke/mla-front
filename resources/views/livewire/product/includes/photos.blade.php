<div x-show="tab === 'photos'" class="flex w-full flex-col items-start gap-y-4 py-8">

    <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
        x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false"
        x-on:livewire-upload-progress="progress = $event.detail.progress">

        <div class="w-full">
            <x-input-label for="photos" value="Photos" />
            <x-text-input wire:model.defer="product.photos" id="photos" type="file" name="photos"
                class="mt-1 block w-full" />
            <x-input-error :messages="$errors->get('photos')" class="mt-2" />
        </div>

        <div class="mt-4" x-show="isUploading">
            <div class="h-2 flex flex-row items-center justify-start relative w-full bg-gray-100 rounded-full">
                <div :style="{width: `${progress}%`}" class="h-2 flex flex-row items-center absolute w-full bg-green-700 rounded-full">
                </div>
            </div>
        </div>

    </div>

    <div class="flex w-full flex-row flex-wrap gap-4 items-center">
        @foreach ($product->photos as $photo)
        {{ $photo }}
            <div class="h-[100px] w-[100px] realtive">
                <img src="{{ Storage::disk('s3')->temporaryUrl($photo->path, now()->addMinute()) }}" class="p-4 border border-gray-300 rounded-lg h-[100px] w-[100px] object-contain">
            </div>
        @endforeach
    </div>
</div>
