<div>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" />
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="flex justify-end">
                        @if ($showTable)
                            <x-primary-button wire:click="toggleShowTable">
                                {{ __('Novo Cliente') }}
                            </x-primary-button>
                        @else
                            <x-secondary-button wire:click="toggleShowTable">
                                {{ __('Voltar') }}
                            </x-secondary-button>
                        @endif

                    </div>


                    @if ($showTable)
                        @livewire('admin.customers.components.table')
                    @else
                        @livewire('admin.customers.components.create-customer')
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        document.addEventListener('livewire:initialized', () => {
            @this.on('getAddress', (event) => {
                document.getElementById("rua").value = event[0].address;
                document.getElementById("cidade").value = event[0].city;
                document.getElementById("bairro").value = event[0].district;
            });
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
    </script>
</div>
