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
                                            <h6>Usuários</h6>
                                            <hr>
                                        </div>
                                        @livewire('admin.miscellaneous-records.components.user-table')

                                    </div>
                                    <div>
                                        <div class="mb-4">
                                            <h6>Serviços</h6>
                                            <hr>

                                        </div>
                                        @livewire('admin.miscellaneous-records.components.services-type-table')
                                    </div>
                                </div>
                            </div>
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
        window.addEventListener('livewire:initialized', () => {

            @this.on('sweetAlert', (event) => {
                swal.fire({
                    position: 'top-end',
                    text: event[0].msg,
                    icon: event[0].icon,
                    showConfirmButton: false,
                    timer: 3000,
                });
            });

            @this.on('editSpecie', (event) => {
                document.getElementById("name-specie").value = event[0].name;
                document.getElementById("description-specie").value = event[0].description;
            })
            @this.on('addSpecie', (event) => {
                document.getElementById("name-specie").value = '';
                document.getElementById("description-specie").value = '';
            })
            @this.on('editBreed', (event) => {
                document.getElementById("name-breed").value = event[0].name;
                document.getElementById("specie-id-breed").value = event[0].specie_id;
                document.getElementById("description-breed").value = event[0].description;
            })
            @this.on('addBreed', (event) => {
                document.getElementById("name-breed").value = '';
                document.getElementById("specie-id-breed").value = '';
                document.getElementById("description-breed").value = '';
            })
            @this.on('editUser', (event) => {

                document.getElementById("user_type").value = event[0].user_type_id;
                document.getElementById("name-user").value = event[0].name;
                document.getElementById("email-user").value = event[0].email;
                document.getElementById("gender-user").value = event[0].gender;
                document.getElementById("cell_phone-user").value = event[0].cellphone_number;
                document.getElementById("cpf-user").value = event[0].cpf;
                document.getElementById("rg-user").value = event[0].rg;
                document.getElementById("qualification").value = event[1].qualification;
                document.getElementById("crmv").value = event[1].crmv;
                document.getElementById("password-user").value = '';
                document.getElementById("password-user-confirm").value = '';

            })
            @this.on('addUser', (event) => {
                document.getElementById("user_type").value = '';
                document.getElementById("name-user").value = '';
                document.getElementById("email-user").value = '';
                document.getElementById("gender-user").value = '';
                document.getElementById("cell_phone-user").value = '';
                document.getElementById("cpf-user").value = '';
                document.getElementById("rg-user").value = '';
                document.getElementById("qualification").value = '';
                document.getElementById("crmv").value = '';
                document.getElementById("password-user").value = '';
                document.getElementById("password-user-confirm").value = '';
            });

            @this.on('showFormVet', (event) => {
                let div = document.getElementById("form-vet");
                if (event[0]) {
                    div.style.display = "block";
                } else {
                    div.style.display = "none";
                }

            })

        });
    </script>
</div>
