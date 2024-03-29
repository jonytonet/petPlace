<div>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" />
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="flex justify-end">
                        <div class="flex items-center justify-center mb-4">
                            <div class="inline-flex rounded-md shadow-[0_4px_9px_-4px_rgba(51,45,45,0.7)] transition duration-150 ease-in-out hover:bg-neutral-800 hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] focus:bg-neutral-800 focus:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] focus:outline-none focus:ring-0 active:bg-neutral-900 active:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] dark:bg-neutral-900 dark:shadow-[0_4px_9px_-4px_#030202] dark:hover:bg-neutral-900 dark:hover:shadow-[0_8px_9px_-4px_rgba(3,2,2,0.3),0_4px_18px_0_rgba(3,2,2,0.2)] dark:focus:bg-neutral-900 dark:focus:shadow-[0_8px_9px_-4px_rgba(3,2,2,0.3),0_4px_18px_0_rgba(3,2,2,0.2)] dark:active:bg-neutral-900 dark:active:shadow-[0_8px_9px_-4px_rgba(3,2,2,0.3),0_4px_18px_0_rgba(3,2,2,0.2)]"
                                role="group">
                                <button type="button"
                                    class="items-center inline-block px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-l dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800"
                                    data-te-ripple-init data-te-ripple-color="light" data-te-toggle="modal"
                                    data-te-target="#bath-control-modal">
                                    <i class="fa-solid fa-calendar-days"></i> Agendar
                                </button>
                                <button type="button"
                                    class="items-center inline-block px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800"
                                    data-te-ripple-init data-te-ripple-color="light" data-te-toggle="modal"
                                    data-te-target="#bath-add-plan-pet-modal">
                                    <i class="fa-solid fa-cash-register"></i> Novo Pacote X Pet
                                </button>

                                <button type="button" wire:click="goToPlans"
                                    class="items-center inline-block px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-r dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800"
                                    data-te-ripple-init data-te-ripple-color="light">
                                    <i class="fa-solid fa-list"></i>Pacotes de Banho
                                </button>

                            </div>

                        </div>


                    </div>

                     @livewire('admin.bath-and-grooming.control.table-booking')

                </div>
            </div>



            <div wire:ignore.defer data-te-modal-init
                class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                id="bath-control-modal" tabindex="-1" aria-labelledby="bath-control-modalLabel" aria-modal="true"
                role="dialog">
                <div data-te-modal-dialog-ref
                    class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px] min-[992px]:max-w-[800px]">
                    <div
                        class="relative flex flex-col w-full text-current bg-white border-none rounded-md shadow-lg outline-none pointer-events-auto bg-clip-padding dark:bg-neutral-600">
                        <div
                            class="flex items-center justify-between flex-shrink-0 p-4 border-b-2 border-opacity-100 rounded-t-md border-neutral-100 dark:border-opacity-50">
                            <!--Modal title-->
                            <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                                id="bath-control-modalLabel">
                                Agendar Banho
                            </h5>
                            <!--Close button-->
                            <button type="button"
                                class="box-content border-none rounded-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                                data-te-modal-dismiss aria-label="Close">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <form wire:submit='booking'>
                            <!--Modal body-->
                            <div class="relative flex-auto p-4" data-te-modal-body-ref>
                                <div class="relative flex-auto p-4" data-te-modal-body-ref>
                                    <div class="mb-4">
                                        <label for="pet"
                                            class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Pet</label>
                                        <select class="input" data-te-select-init data-te-select-filter="true"
                                            wire:model.live='petId'>
                                            <option value="">Selecione</option>
                                            @foreach ($pets as $pet)
                                                <option value="{{ $pet->id }}">{{ $pet->name }}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                    <div class="mb-4">
                                        <label for="pet"
                                            class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Tipo</label>
                                        <select class="input" wire:change='checkBathPlan' wire:model.live='type'
                                            id="type_bath">
                                            <option value="">Selecione</option>
                                            <option value="single">Avulso</option>
                                            <option value="plan">Pacote</option>
                                        </select>

                                    </div>
                                    <div class="mb-4">
                                        <label for="date_time"
                                            class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Date
                                            e Hora</label>
                                        <input type="datetime-local" id="date_time" class="input" wire:model='date'
                                            min="{{ now()->toDateString() }}T00:00" required />

                                    </div>

                                    <div class="mb-4" id='value_display' style="display: none">
                                        <label for="date_time"
                                            class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Valor
                                            Diária</label>
                                        <input type="text" id="date_time" class="input" wire:model='singleValue'

                                            onkeyup="validePriceInput(event)" />

                                    </div>

                                    <div class="mb-4">
                                        <label for="pet"
                                            class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Tipo
                                            de Serviço</label>
                                        <select class="input" data-te-select-init data-te-select-filter="true"
                                            wire:model='serviceTypeId' id="service_type_id">
                                            <option value="">Selecione</option>
                                            @foreach ($serviceTypes as $serviceType)
                                                <option value="{{ $serviceType->id }}">{{ $serviceType->name }}
                                                </option>
                                            @endforeach

                                        </select>

                                    </div>
                                    <div class="mb-4">
                                        <label
                                            class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Qual
                                            Será o Banho?</label>
                                        <div class="mb-[0.125rem] grid grid-cols-2 gap-4">
                                            <!-- Primeira coluna -->
                                            <div>
                                                <input wire:model='bathType' type="checkbox" value="Banho Simples"
                                                    id="bath_simples" />
                                                <label
                                                    class="inline-block pl-[0.15rem] hover:cursor-pointer text-neutral-700 dark:text-neutral-200 text-xs"
                                                    for="bath_simples">
                                                    Banho Simples
                                                </label><br>
                                                <input wire:model='bathType' type="checkbox"
                                                    value="Banho + Tosa Higiênica" id="bath_higienica" />
                                                <label
                                                    class="inline-block pl-[0.15rem] hover:cursor-pointer text-neutral-700 dark:text-neutral-200 text-xs"
                                                    for="bath_higienica">
                                                    Banho + Tosa Higiênica
                                                </label><br>
                                                <input wire:model='bathType' type="checkbox"
                                                    value="Banho + Tosa Geral Tesoura" id="bath_geral_tesoura" />
                                                <label
                                                    class="inline-block pl-[0.15rem] hover:cursor-pointer text-neutral-700 dark:text-neutral-200 text-xs"
                                                    for="bath_geral_tesoura">
                                                    Banho + Tosa Geral Tesoura
                                                </label><br>
                                                <input wire:model='bathType' type="checkbox"
                                                    value="Banho Branqueador" id="bath_branqueador" />
                                                <label
                                                    class="inline-block pl-[0.15rem] hover:cursor-pointer text-neutral-700 dark:text-neutral-200 text-xs"
                                                    for="bath_branqueador">
                                                    Banho Branqueador
                                                </label><br>

                                            </div>

                                            <!-- Segunda coluna -->
                                            <div>
                                                <input wire:model='bathType' type="checkbox"
                                                    value="Banho + Tosa Padrão" id="bath_padrao" />
                                                <label
                                                    class="inline-block pl-[0.15rem] hover:cursor-pointer text-neutral-700 dark:text-neutral-200 text-xs"
                                                    for="bath_padrao">
                                                    Banho + Tosa Padrão
                                                </label><br>
                                                <input wire:model='bathType' type="checkbox"
                                                    value="Banho + Tosa Geral Lâmina" id="bath_geral_lamina" />
                                                <label
                                                    class="inline-block pl-[0.15rem] hover:cursor-pointer text-neutral-700 dark:text-neutral-200 text-xs"
                                                    for="bath_geral_lamina">
                                                    Banho + Tosa Geral Lâmina
                                                </label><br>
                                                <input wire:model='bathType' type="checkbox" value="Banho Antipulga"
                                                    id="bath_antipulga" />
                                                <label
                                                    class="inline-block pl-[0.15rem] hover:cursor-pointer text-neutral-700 dark:text-neutral-200 text-xs"
                                                    for="bath_antipulga">
                                                    Banho Antipulga
                                                </label><br>
                                                <input wire:model='bathType' type="checkbox"
                                                    value="Banho Medicamentoso" id="bath_medicamentoso" />
                                                <label
                                                    class="inline-block pl-[0.15rem] hover:cursor-pointer text-neutral-700 dark:text-neutral-200 text-xs"
                                                    for="bath_medicamentoso">
                                                    Banho Medicamentoso
                                                </label><br>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="mb-4">
                                        <label
                                            class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Alguma
                                            Finalização?</label>
                                        <div class="mb-[0.125rem] grid grid-cols-2 gap-4">
                                            <!-- Primeira coluna -->
                                            <div>
                                                <input wire:model='bathComplement' type="checkbox" value="Perfume"
                                                    id="perfume" />
                                                <label
                                                    class="inline-block pl-[0.15rem] hover:cursor-pointer text-neutral-700 dark:text-neutral-200 text-xs"
                                                    for="perfume">
                                                    Perfume
                                                </label><br>
                                                <input wire:model='bathComplement' type="checkbox" value="Laço"
                                                    id="laco" />
                                                <label
                                                    class="inline-block pl-[0.15rem] hover:cursor-pointer text-neutral-700 dark:text-neutral-200 text-xs"
                                                    for="laco">
                                                    Laço
                                                </label><br>
                                                <input wire:model='bathComplement' type="checkbox" value="Gravata"
                                                    id="gravata" />
                                                <label
                                                    class="inline-block pl-[0.15rem] hover:cursor-pointer text-neutral-700 dark:text-neutral-200 text-xs"
                                                    for="gravata">
                                                    Gravata
                                                </label><br>


                                            </div>

                                            <!-- Segunda coluna -->
                                            <div>
                                                <input wire:model='bathComplement' type="checkbox" value="Corte Unha"
                                                    id="corte_unha" />
                                                <label
                                                    class="inline-block pl-[0.15rem] hover:cursor-pointer text-neutral-700 dark:text-neutral-200 text-xs"
                                                    for="corte_unha">
                                                    Corte Unha
                                                </label><br>
                                                <input wire:model='bathComplement' type="checkbox"
                                                    value="Limpeza Ouvidos" id="limpeza_ouvido" />
                                                <label
                                                    class="inline-block pl-[0.15rem] hover:cursor-pointer text-neutral-700 dark:text-neutral-200 text-xs"
                                                    for="limpeza_ouvido">
                                                    Limpeza Ouvidos
                                                </label><br>
                                                <input wire:model='bathComplement' type="checkbox"
                                                    value="Escovação Dentes" id="escovacao_dentes" />
                                                <label
                                                    class="inline-block pl-[0.15rem] hover:cursor-pointer text-neutral-700 dark:text-neutral-200 text-xs"
                                                    for="escovacao_dentes">
                                                    Escovação Dentes
                                                </label><br>


                                            </div>
                                        </div>

                                    </div>
                                    <div class="mb-4">
                                        <label for=""
                                            class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Serviço
                                            Extras</label>
                                        <textarea wire:model='extraServices'
                                            class="peer block min-h-[auto] w-full rounded border bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0  dark:border-neutral-200"
                                            id="exampleFormControlTextarea1" rows="3" placeholder="">
                                        </textarea>

                                    </div>
                                    <div class="mb-4">
                                        <label for=""
                                            class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Observações</label>
                                        <textarea wire:model='notes'
                                            class="peer block min-h-[auto] w-full rounded border bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0  dark:border-neutral-200"
                                            id="exampleFormControlTextarea1" rows="3" placeholder="">
                                        </textarea>

                                    </div>



                                </div>
                            </div>
                            <!--Modal footer-->
                            <div
                                class="flex flex-wrap items-center justify-end flex-shrink-0 p-4 border-t-2 border-opacity-100 rounded-b-md border-neutral-100 dark:border-opacity-50">
                                <x-secondary-button type='reset' data-te-modal-dismiss data-te-ripple-init
                                    data-te-ripple-color="light">
                                    {{ __('Cancelar') }}
                                </x-secondary-button>

                                <x-primary-button class="ml-3" type='submit'>
                                    {{ __('Salvar') }}
                                </x-primary-button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>


            @livewire('admin.bath-and-grooming.control.modal-add-plan-to-pet')
        </div>

        <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
        <script>
            function validePriceInput(event) {
                const input = event.target;
                const value = input.value.replace(/[^0-9.,]/g, "");
                input.value = value;
            }

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

                @this.on('booking-notes', (event) => {
                    document.getElementById("booking-notes").value = event[0];

                });
                @this.on('booking-notes-clear', (event) => {
                    document.getElementById("booking-notes").value = '';
                });

                @this.on('clearPetPlan', (event) => {
                    document.getElementById("pet_id_plan_pet").value = '';
                    document.getElementById("plan_id_plan_pet").value = '';
                    document.getElementById("service_type_id").value = '';
                });

                @this.on('typeClear', (event) => {
                    document.getElementById("type_bath").value = '';

                })
                @this.on('valueVisible', (event) => {
                    document.getElementById("value_display").style.display = 'block';

                })
                @this.on('valueInvisible', (event) => {
                    document.getElementById("value_display").style.display = 'none';

                })


            });
        </script>
    </div>
