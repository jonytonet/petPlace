<div>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" />
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between">
                        <div class="mb-4">
                            <h6><span>Histórico de Mensalidades @if ($pet)
                                        {{ $pet }}
                                    @endif
                                </span></h6>
                        </div>
                        <div class="flex items-center justify-center mb-4">
                            <x-secondary-button wire:click='goToIndex'>
                                {{ __('Voltar') }}
                            </x-secondary-button>
                        </div>
                    </div>
                    <hr>
                    <div class="w-full">


                        <div class="sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-x-auto sm:max-w-[473.6px] md:max-w-full">
                                    <div class="overflow-y-auto max-h-500">
                                        <table class="min-w-full font-light text-left">
                                            <thead class="text-sm font-medium border-b dark:border-neutral-500">
                                                <tr>
                                                    <th scope="col" class="px-6 py-4"><span role="button">#</span>
                                                    </th>
                                                    <th scope="col" class="px-6 py-4"><span role="button">Mês
                                                            Referência</span>
                                                    </th>

                                                    <th scope="col" class="px-6 py-4 text-center"><span
                                                            role="button">Venc. Mensalidade</span></th>
                                                    <th scope="col" class="px-6 py-4"><span role="button">
                                                            Data pagamento</span></th>

                                                    <th scope="col" class="px-6 py-4 text-center">Receber</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-xs">

                                                @php
                                                    $isPay = $payments->first()->reference_month == \Carbon\Carbon::now()->format('Y-m');
                                                    $dayP = \Carbon\Carbon::parse($payments->first()->daycareEnrollment->initial_date_plan)->day;
                                                    $isDelay = \Carbon\Carbon::now()->format('Y-m') . '-' . $dayP < \Carbon\Carbon::now();
                                                @endphp
                                                @if (!$isPay)

                                                    <tr
                                                        class="transition duration-300 ease-in-out border-b hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            #</td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            {{ \Carbon\Carbon::parse($payments->first()->reference_month)->addMonth()->format('m/Y') }}
                                                        </td>
                                                        <td class="px-6 py-4 text-center whitespace-nowrap">
                                                            {{ $dayP }}
                                                        </td>

                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            @if ($isDelay)
                                                                Em atraso
                                                            @else
                                                                A receber
                                                            @endif
                                                        </td>


                                                        <td class="px-6 py-4 text-center whitespace-nowrap">

                                                            <x-primary-button
                                                                wire:click="monthlyPayment({{ $payments->first()->daycareEnrollment->id }})"
                                                                data-te-toggle="modal"
                                                                data-te-target="#pay-monthly-modal" data-te-ripple-init
                                                                data-te-ripple-color="light">
                                                                <i class="fa-solid fa-cash-register"></i>

                                                            </x-primary-button>

                                                        </td>
                                                    </tr>

                                                @endif
                                                @foreach ($payments as $payment)
                                                    <tr
                                                        class="transition duration-300 ease-in-out border-b hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            {{ $payment->id }}</td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            {{ \Carbon\Carbon::parse($payment->reference_month)->format('m/Y') }}
                                                        </td>
                                                        <td class="px-6 py-4 text-center whitespace-nowrap">
                                                            {{ \Carbon\Carbon::parse($payment->daycareEnrollment->initial_date_plan)->day }}
                                                        </td>

                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            @if ($payment->pay_day)
                                                                {{ \Carbon\Carbon::parse($payment->pay_day)->format('d/m/Y') }}
                                                            @else
                                                                Sem registro
                                                            @endif
                                                        </td>


                                                        <td class="px-6 py-4 text-center whitespace-nowrap">
                                                            @if ($payment->pay_day)
                                                                <button type="button"
                                                                    class="inline-block rounded bg-success px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]">
                                                                    <i class="fa-solid fa-check"></i>
                                                                </button>
                                                            @else
                                                                <x-primary-button
                                                                    wire:click="monthlyPayment({{ $payment->daycareEnrollment->id }})"
                                                                    data-te-toggle="modal"
                                                                    data-te-target="#pay-monthly-modal"
                                                                    data-te-ripple-init data-te-ripple-color="light">
                                                                    <i class="fa-solid fa-cash-register"></i>

                                                                </x-primary-button>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    {{ $payments->links() }}
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div wire:ignore.defer data-te-modal-init
                class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                id="pay-monthly-modal" tabindex="-1" aria-labelledby="pay-monthly-modalLabel" aria-modal="true"
                role="dialog">
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
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
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
