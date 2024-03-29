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

                                <div class="flex items-center justify-between mt-3">
                                    <div class="flex items-center">
                                        <input type="text" class="input" style="max-width: 200px"
                                            placeholder="Digite o nome do pet" wire:model.live='searchTerms' />
                                        <div style="width: 10px"></div>
                                        <div class="ml-10 block min-h-[1.5rem] pl-[1.5rem]" style="width: 200px">
                                            <input wire:model.live='onlyActive'
                                                class="relative float-left -ml-[1.5rem] mr-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent dark:border-neutral-600 dark:checked:border-primary dark:checked:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                                                type="checkbox" value="" id="checkboxDefault" />
                                            <label class="inline-block pl-[0.15rem] hover:cursor-pointer"
                                                style="font-size: 12px" for="checkboxDefault">Apenas Ativos</label>
                                        </div>
                                    </div>
                                    <button type="button" wire:click="addEnrollment"
                                        class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-700 dark:hover-bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active-bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800'"
                                        data-te-toggle="modal" data-te-target="#form-create-enrollment"
                                        data-te-ripple-init data-te-ripple-color="light">Nova Matricula</button>
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
                                                                    role="button">Pet</span></th>
                                                            <th scope="col" class="px-6 py-4"><span
                                                                    role="button">Plano</span></th>
                                                            <th scope="col" class="px-6 py-4 text-center"><span
                                                                    role="button">Venc. Mensalidade</span></th>
                                                            <th scope="col" class="px-6 py-4"><span
                                                                    role="button">Último Pag</span></th>
                                                            <th scope="col" class="px-6 py-4"><span
                                                                    role="button">Status</span></th>
                                                            <th scope="col" class="px-6 py-4 text-center">Ações</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-xs">
                                                        @foreach ($enrollments as $enrollment)
                                                            <tr
                                                                class="transition duration-300 ease-in-out border-b hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                                                <td class="px-6 py-4 font-medium whitespace-nowrap">
                                                                    {{ $enrollment->id }}</td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    {{ $enrollment->pet->name }}</td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    {{ $enrollment->daycarePlan->name }}</td>
                                                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                                                    {{ \Carbon\Carbon::parse($enrollment->initial_date_plan)->day }}
                                                                </td>
                                                                @php
                                                                    $lastPayment = null;
                                                                    $overdue = false;
                                                                    $daycareMonthlyPayment = $enrollment->daycareMonthlyPayment->first();
                                                                    $date = \Carbon\Carbon::parse($enrollment->initial_date_plan)->setMonth(\Carbon\Carbon::now()->month);
                                                                    if ($daycareMonthlyPayment) {
                                                                        $lastPayment = $daycareMonthlyPayment->pay_day;
                                                                        $monthReference = $daycareMonthlyPayment->reference_month;

                                                                        $overdue = app()
                                                                            ->make(App\Services\DaycareMonthlyPaymentService::class)
                                                                            ->isPaymentDelayed(\Carbon\Carbon::parse($enrollment->initial_date_plan)->day, $lastPayment, $monthReference);
                                                                    }

                                                                @endphp
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    @if ($lastPayment)
                                                                        {{ \Carbon\Carbon::parse($lastPayment)->format('d/m/Y') }}
                                                                    @else
                                                                        Sem registro
                                                                    @endif
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    @if ($overdue)
                                                                        <span
                                                                            class="inline-block whitespace-nowrap rounded-[0.27rem] bg-warning-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-warning-800">
                                                                            Em Atraso
                                                                        </span>
                                                                    @elseif($enrollment->active)
                                                                        <span
                                                                            class="inline-block whitespace-nowrap rounded-[0.27rem] bg-success-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-success-700">
                                                                            Ativo
                                                                        </span>
                                                                    @else
                                                                        <span
                                                                            class="inline-block whitespace-nowrap rounded-[0.27rem] bg-danger-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-danger-700">
                                                                            Inativo
                                                                        </span>
                                                                    @endif
                                                                </td>

                                                                <td class="px-6 py-4 text-center whitespace-nowrap">

                                                                    <x-primary-button
                                                                        wire:click="monthlyPayment({{ $enrollment->id }})"
                                                                        data-te-toggle="modal"
                                                                        data-te-target="#pay-monthly-modal"
                                                                        data-te-ripple-init
                                                                        data-te-ripple-color="light">
                                                                        <i class="fa-solid fa-cash-register"></i>
                                                                    </x-primary-button>
                                                                    <x-secondary-button
                                                                        wire:click="openModalMonthlyPayments('{{ $enrollment->pet->id }}')">
                                                                        <i class="fa-regular fa-file-lines"></i>
                                                                    </x-secondary-button>
                                                                    @if ($enrollment->active)
                                                                        <x-danger-button title="Inativar"
                                                                            wire:click="destroyEnrollment({{ $enrollment->id }})">
                                                                            <i class="fa-solid fa-power-off"></i>
                                                                        </x-danger-button>
                                                                    @endif

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

                                            <form wire:submit='createEnrollment'>
                                                <!--Modal body-->
                                                <div class="relative flex-auto p-4" data-te-modal-body-ref>
                                                    <div id="enrollment">
                                                        <div class="mb-4">
                                                            <label for="pet"
                                                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Pet</label>
                                                            <select class="input" data-te-select-init id="pet"
                                                                data-te-select-filter="true" wire:model='petId'>
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
                                                            <label for="plan"
                                                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Plano</label>
                                                            <select class="input" data-te-select-init id="plan"
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
                                                    <div id="payment-session" style="display: none">
                                                        <livewire:admin.daycare.components.monthly-payments
                                                            :daycareEnrollmentId="$daycareEnrollmentId">
                                                    </div>
                                                </div>
                                                <!--Modal footer-->
                                                <div
                                                    class="flex flex-wrap items-center justify-end flex-shrink-0 p-4 border-t-2 border-opacity-100 rounded-b-md border-neutral-100 dark:border-opacity-50">
                                                    <div id="enrollment-foot">

                                                        <x-secondary-button type='reset' data-te-modal-dismiss
                                                            data-te-ripple-init data-te-ripple-color="light">
                                                            {{ __('Cancelar') }}
                                                        </x-secondary-button>

                                                        <x-primary-button class="ml-3" type='submit'>
                                                            {{ __('Gerar Contrato') }} <div
                                                                wire:loading='createEnrollment'
                                                                class="inline-block h-3 w-3 animate-spin rounded-full border-2 border-solid border-current border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite]"
                                                                role="status">
                                                                <span
                                                                    class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
                                                            </div>
                                                        </x-primary-button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div wire:ignore.defer data-te-modal-init
                                    class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                                    id="pay-monthly-modal" tabindex="-1" aria-labelledby="pay-monthly-modalLabel"
                                    aria-modal="true" role="dialog">
                                    <div data-te-modal-dialog-ref
                                        class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px] min-[992px]:max-w-[800px]">
                                        <div
                                            class="relative flex flex-col w-full text-current bg-white border-none rounded-md shadow-lg outline-none pointer-events-auto bg-clip-padding dark:bg-neutral-600">
                                            <div
                                                class="flex items-center justify-between flex-shrink-0 p-4 border-b-2 border-opacity-100 rounded-t-md border-neutral-100 dark:border-opacity-50">
                                                <!--Modal title-->
                                                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                                                    id="pay-monthly-modalLabel">
                                                    Mensalidade
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

                                            <!--Modal body-->
                                            <div class="relative flex-auto p-4" data-te-modal-body-ref>


                                                <livewire:admin.daycare.components.monthly-payments>

                                            </div>
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
                @this.on('get-daycare-monthly-payment', (event) => {
                    document.getElementById('enrollment').style.display = 'none';
                    document.getElementById('enrollment-foot').style.display = 'none';
                    document.getElementById('payment-session').style.display = 'block';
                });

                @this.on('add-enrollment', (event) => {
                    document.getElementById('enrollment').style.display = 'block';
                    document.getElementById('enrollment-foot').style.display = 'block';
                    document.getElementById('payment-session').style.display = 'none';
                    document.getElementById('pet').value = '';
                    document.getElementById('plan').value = '';
                    document.getElementById('start').value = '';
                });
            });
        </script>
    </div>
