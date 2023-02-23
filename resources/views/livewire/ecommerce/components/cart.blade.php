<div x-data="{ visible:@entangle('visible') }" x-on:toggle-cart.window="visible = !visible">
    <div x-show="visible" 
        x-transition:enter="transition ease-linear duration-300" 
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-75" 
        x-transition:leave="transition-opacity ease-linear duration-300"
        x-transition:leave-start="opacity-75" 
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-neutral-400 bg-opacity-25"></div>
    <div
        x-show="visible"
        x-on:click.outside="visible = false"
        x-transition:enter="transition ease-in-out duration-300 transform" 
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0" 
        x-transition:leave="transition ease-in-out duration-300 transform"
        x-transition:leave-start="translate-x-0" 
        x-transition:leave-end="translate-x-full"
         class="absolute right-0 top-0 flex min-h-screen w-[400px] bg-neutral-dark">
        <div class="relative h-screen w-full overflow-y-auto">
            <div class="w-full divide-y divide-dotted divide-neutral-200 py-4 pt-4 pb-20">

                <div class="ml-4 flex flex-row items-center gap-x-2 py-4">
                    <div class="rounded-full bg-neutral-white p-4"></div>
                    <div class="flex flex-col">
                        <span class="text-body-md text-neutral-white">Nome do Produto</span>
                        <span class="text-body-sm text-neutral-white">Descrição</span>
                    </div>
                </div>

                <div class="ml-4 flex flex-row items-center gap-x-2 py-4">
                    <div class="rounded-full bg-neutral-white p-4"></div>
                    <div class="flex flex-col">
                        <span class="text-body-md text-neutral-white">Nome do Produto</span>
                        <span class="text-body-sm text-neutral-white">Descrição</span>
                    </div>
                </div>


                <div class="fixed bottom-0 w-full max-w-[365px] border-t border-neutral-800 p-4">
                    <button
                        class="w-full rounded-md bg-neutral-800 px-4 py-6 text-btn text-neutral-white hover:bg-neutral-400">
                        Finalizar compra
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>
