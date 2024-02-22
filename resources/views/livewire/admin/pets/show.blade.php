<div>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" />
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-end">
                        <x-secondary-button wire:click='goBack'>
                            {{ __('Voltar') }}
                        </x-secondary-button>
                    </div>

                    <div>

                        <ul class="flex flex-row flex-wrap pl-0 mb-5 list-none border-b-0" role="tablist"
                            data-te-nav-ref>
                            <li role="presentation">
                                <a href="#tabs-home"
                                    class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                                    data-te-toggle="pill" data-te-target="#tabs-home" data-te-nav-active role="tab"
                                    aria-controls="tabs-home" aria-selected="true">Informações</a>
                            </li>
                            <li role="presentation">
                                <a href="#tabs-profile"
                                    class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                                    data-te-toggle="pill" data-te-target="#tabs-profile" role="tab"
                                    aria-controls="tabs-profile" aria-selected="false">Banho & Tosa</a>
                            </li>
                            <li role="presentation">
                                <a href="#tabs-messages"
                                    class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                                    data-te-toggle="pill" data-te-target="#tabs-messages" role="tab"
                                    aria-controls="tabs-messages" aria-selected="false">Daycare</a>
                            </li>
                            <li role="presentation">
                                <a href="#tabs-vet"
                                    class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                                    data-te-toggle="pill" data-te-target="#tabs-vet" role="tab"
                                    aria-controls="tabs-vet" aria-selected="false">Controle Veterinário</a>
                            </li>

                        </ul>

                        <!--Tabs content-->
                        <div class="mb-6">
                            <div class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                                id="tabs-home" role="tabpanel" aria-labelledby="tabs-home-tab" data-te-tab-active>
                                @livewire('admin.pets.components.info-tab', ['pet' => $pet])
                            </div>
                            <div class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                                id="tabs-profile" role="tabpanel" aria-labelledby="tabs-profile-tab">
                                @livewire('admin.pets.components.bath-and-grooming-tab', ['pet' => $pet])
                            </div>
                            <div class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                                id="tabs-messages" role="tabpanel" aria-labelledby="tabs-profile-tab">
                                @livewire('admin.pets.components.daycare-tab', ['pet' => $pet])
                            </div>
                            <div class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                                id="tabs-vet" role="tabpanel" aria-labelledby="tabs-profile-tab">
                                @livewire('admin.pets.components.dewormer-tab', ['pet' => $pet])
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        document.addEventListener('livewire:initialized', () => {

            @this.on('sweetAlert', (event) => {
                swal.fire({
                    position: 'top-end',
                    text: event[0].msg,
                    icon: event[0].icon,
                    showConfirmButton: false,
                    timer: 3000,
                });
            });


        });

        function validePriceInput(event) {
                const input = event.target;
                const value = input.value.replace(/[^0-9.,]/g, "");
                input.value = value;
            }
    </script>
</div>
