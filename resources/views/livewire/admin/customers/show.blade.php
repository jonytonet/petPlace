<div>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" />
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-end">
                        <x-secondary-button wire:click='goIndex'>
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
                                    aria-controls="tabs-profile" aria-selected="false">Pets</a>
                            </li>
                            <li role="presentation">
                                <a href="#tabs-messages"
                                    class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                                    data-te-toggle="pill" data-te-target="#tabs-messages" role="tab"
                                    aria-controls="tabs-messages" aria-selected="false">Financeiro</a>
                            </li>

                        </ul>

                        <!--Tabs content-->
                        <div class="mb-6">
                            <div class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                                id="tabs-home" role="tabpanel" aria-labelledby="tabs-home-tab" data-te-tab-active>
                                @livewire('admin.customers.components.info-tab', ['customer' => $customer])
                            </div>
                            <div class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                                id="tabs-profile" role="tabpanel" aria-labelledby="tabs-profile-tab">
                                @livewire('admin.customers.components.pets-tab', ['customer' => $customer])
                            </div>
                            <div class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                                id="tabs-messages" role="tabpanel" aria-labelledby="tabs-profile-tab">
                                @livewire('admin.customers.components.finance-tab', ['customer' => $customer])
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
            @this.on('getAddress', (event) => {
                document.getElementById("customer-address-rua").value = event[0].address;
                document.getElementById("customer-address-complement").value = '';
                document.getElementById("customer-address-city").value = event[0].city;
                document.getElementById("customer-address-district").value = event[0].district;
                document.getElementById("customer-address-state").value = event[0].state;
            });


        });
    </script>
</div>
