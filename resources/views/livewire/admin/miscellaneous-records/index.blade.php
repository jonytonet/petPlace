<div>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" />
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section class="space-y-6">

                        <div class="w-full">
                            <div class="p-6">

                                <div class="grid grid-cols-2 gap-6">
                                    <div>
                                        <div class="mb-4">
                                            <h6>Especies</h6>
                                            <hr>
                                        </div>
                                        @livewire('admin.miscellaneous-records.components.species-table')

                                    </div>
                                    <div>
                                        <div class="mb-4">
                                            <h6>Raças</h6>
                                            <hr>

                                        </div>
                                        @livewire('admin.miscellaneous-records.components.breeds-table')
                                    </div>
                                </div>
                            </div>
                        </div>

                    </section>

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
    </script>
</div>
