<div x-show="tab === 'photos'" class="flex w-full flex-col items-start gap-y-4 py-8">

    <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
        x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false"
        x-on:livewire-upload-progress="progress = $event.detail.progress">

        <div class="w-full">
            <x-input-label for="photos" value="Photos" />
            <x-text-input wire:model="photo" id="photos" type="file" name="photos" class="mt-1 block w-full" />
            <x-input-error :messages="$errors->get('photos')" class="mt-2" />
        </div>

        <div class="mt-4" x-show="isUploading">
            <div class="relative flex h-2 w-full flex-row items-center justify-start rounded-full bg-gray-100">
                <div :style="{ width: `${progress}%` }"
                    class="absolute flex h-2 w-full flex-row items-center rounded-full bg-green-700">
                </div>
            </div>
        </div>

    </div>

    <div class="flex w-full flex-row flex-wrap items-center gap-4">
        @foreach ($product->photos as $photo)
            <div class="realtive h-[100px] w-[100px]">
                <div class="absolute h-full w-full flex-row items-start p-2 opacity-0 hover:opacity-100">
                    <button wire:click="setFeatured({{ $photo->id }})">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" @class([
                                'w-6 h-6',
                                'text-yellow-400' => $photo->featured,
                                'text-gray-200' => !$photo->featured,
                            ])>
                            <path fill-rule="evenodd"
                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                clip-rule="evenodd" />
                        </svg>

                    </button>
                    <button wire:click="deletePhoto({{ $photo->id }})">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="h-6 w-6 text-red-500">
                            <path fill-rule="evenodd"
                                d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                clip-rule="evenodd" />
                        </svg>


                    </button>
                </div>
                <img src="{{ Vite::asset('storage/app/' . $photo->path) }}"
                    class="h-[100px] w-[100px] rounded-lg border border-gray-300 object-contain p-4">
            </div>
        @endforeach
    </div>
</div>
