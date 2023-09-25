<div>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" />
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="flex justify-between">
                        <div class="mb-4">
                            <h6><span>Matricula DayCare</span></h6>

                        </div>
                        <div class="flex items-center justify-center mb-4">
                            <x-secondary-button wire:click='goToIndex'>
                                {{ __('Voltar') }}
                            </x-secondary-button>

                        </div>

                    </div>
                    <hr>
                    <div class="w-full">
                        <div>
                            <div class="flex flex-col ">
                                <div class="flex justify-between mt-3">
                                    <input type="text" class=" input" style="max-width: 200px" placeholder="Pesquise"
                                        wire:model.live='searchTerms' />

                                    <button type="button" wire:click="addEnrollment"
                                        class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800'"
                                        data-te-toggle="modal" data-te-target="#form-create-enrollment"
                                        data-te-ripple-init data-te-ripple-color="light">
                                        Nova Matricula
                                    </button>


                                </div>
                                <div class="sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                        <div class="overflow-x-auto sm:max-w-[473.6px] md:max-w-full">
                                            <div class="overflow-y-auto max-h-500">
                                                <table class="min-w-full font-light text-left">
                                                    <thead class="text-sm font-medium border-b dark:border-neutral-500">
                                                        <tr>
                                                            <th scope="col" class="px-6 py-4"><span
                                                                    role="button">#</span></th>
                                                            <th scope="col" class="px-6 py-4"><span
                                                                    role="button">Nome</span></th>
                                                            <th scope="col" class="px-6 py-4"><span
                                                                    role="button">Especie</span></th>
                                                            <th scope="col" class="px-6 py-4">Ações</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-xs">
                                                        @foreach ($enrollments as $enrollment)
                                                            <tr
                                                                class="transition duration-300 ease-in-out border-b hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                                                <td class="px-6 py-4 font-medium whitespace-nowrap">
                                                                    {{ $enrollment->id }}</td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    {{ $enrollment->name }}</td>

                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <x-secondary-button
                                                                        wire:click="editEnrollment({{ $enrollment->id }})"
                                                                        data-te-toggle="modal"
                                                                        data-te-target="#form-create-enrollment"
                                                                        data-te-ripple-init
                                                                        data-te-ripple-color="light">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </x-secondary-button>
                                                                    <x-danger-button
                                                                        wire:click="destroyEnrollment({{ $enrollment->id }})">
                                                                        <i class="fa-solid fa-trash-can"></i>
                                                                    </x-danger-button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            {{ $enrollments->links() }}
                                        </div>

                                    </div>
                                </div>
                                <div wire:ignore.defer data-te-modal-init
                                    class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                                    id="form-create-enrollment" tabindex="-1"
                                    aria-labelledby="form-create-enrollmentLabel" aria-modal="true" role="dialog">
                                    <div data-te-modal-dialog-ref
                                        class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px] min-[992px]:max-w-[800px]">
                                        <div
                                            class="relative flex flex-col w-full text-current bg-white border-none rounded-md shadow-lg outline-none pointer-events-auto bg-clip-padding dark:bg-neutral-600">
                                            <div
                                                class="flex items-center justify-between flex-shrink-0 p-4 border-b-2 border-opacity-100 rounded-t-md border-neutral-100 dark:border-opacity-50">
                                                <!--Modal title-->
                                                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                                                    id="form-create-enrollmentLabel">
                                                    Nova Matricula
                                                </h5>
                                                <!--Close button-->
                                                <button type="button"
                                                    class="box-content border-none rounded-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                                                    data-te-modal-dismiss aria-label="Close">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <form wire:submit='createOrEditEnrollment'>
                                                <!--Modal body-->
                                                <div class="relative flex-auto p-4" data-te-modal-body-ref>

                                                    <div class="mb-4">
                                                        <label for="pet"
                                                            class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Pet</label>
                                                        <select class="input" data-te-select-init
                                                            style="background-color: whi" data-te-select-filter="true"
                                                            wire:model='petId'>
                                                            <option value="">Selecione</option>
                                                            @foreach ($pets as $pet)
                                                                <option value="{{ $pet->id }}">
                                                                    {{ $pet->name }}</option>
                                                            @endforeach

                                                        </select>
                                                        @error('petId')
                                                            <div class="text-sm font-bold text-red-400">
                                                                {{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-4">
                                                        <label for="Plano"
                                                            class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Plano</label>
                                                        <select class="input" data-te-select-init
                                                            data-te-select-filter="true" wire:model='planId'>
                                                            <option value="">Selecione</option>
                                                            @foreach ($plans as $plan)
                                                                <option value="{{ $plan->id }}">
                                                                    {{ $plan->name }}</option>
                                                            @endforeach

                                                        </select>
                                                        @error('planId')
                                                            <div class="text-sm font-bold text-red-400">
                                                                {{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="start"
                                                            class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Data
                                                            de inicio</label>
                                                        <input type="date" id="start" class="input"
                                                            wire:model='start' />
                                                        @error('form.dateOfBirth')
                                                            <div class="text-sm font-bold text-red-400">
                                                                {{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                </div>
                                                <!--Modal footer-->
                                                <div
                                                    class="flex flex-wrap items-center justify-end flex-shrink-0 p-4 border-t-2 border-opacity-100 rounded-b-md border-neutral-100 dark:border-opacity-50">
                                                    <x-secondary-button type='reset' data-te-modal-dismiss
                                                        data-te-ripple-init data-te-ripple-color="light">
                                                        {{ __('Cancelar') }}
                                                    </x-secondary-button>

                                                    <x-primary-button class="ml-3" type='submit'
                                                        data-te-modal-dismiss data-te-ripple-init
                                                        data-te-ripple-color="light">
                                                        {{ __('Gerar Contrato') }}
                                                    </x-primary-button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
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
        </script>
    </div>
