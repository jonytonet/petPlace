<div>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" />
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto my-24 md:px-6">
                        <!-- Section: Design Block -->
                        <section class="mb-16 text-center">


                            <div class="grid lg:grid-cols-4 lg:gap-x-12">
                                <div class="mb-8 lg:mb-2">
                                    <div
                                        class="block h-full rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                                        <div class="flex justify-center">
                                            <div
                                                class="inline-block p-4 -mt-8 rounded-full shadow-md bg-primary-100 text-primary">
                                                <i class="fa-regular fa-clock"></i>
                                            </div>
                                        </div>
                                        <div class="p-6">
                                            <h3 class="mb-4 text-2xl font-bold text-primary dark:text-primary-400">
                                                {{ number_format($data->todayValue, '2', ',', '.') }}
                                            </h3>
                                            {{--  <h5 class="mb-4 text-lg font-medium">Components</h5> --}}
                                            <p class="text-neutral-500 dark:text-neutral-300">
                                                Hoje.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-8 lg:mb-2">
                                    <div
                                        class="block h-full rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                                        <div class="flex justify-center">
                                            <div
                                                class="inline-block p-4 -mt-8 rounded-full shadow-md bg-primary-100 text-primary">
                                                <i class="fa-solid fa-calendar-check"></i>
                                            </div>
                                        </div>
                                        <div class="p-6">
                                            <h3 class="mb-4 text-2xl font-bold text-primary dark:text-primary-400">
                                                {{ number_format($data->monthValue, '2', ',', '.') }}
                                            </h3>
                                            {{-- <h5 class="mb-4 text-lg font-medium">Growth</h5> --}}
                                            <p class="text-neutral-500 dark:text-neutral-300">
                                                Este mês.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-8 lg:mb-2">
                                    <div
                                        class="block h-full rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                                        <div class="flex justify-center">
                                            <div
                                                class="inline-block p-4 -mt-8 rounded-full shadow-md bg-primary-100 text-primary">
                                                <i class="fa-solid fa-calendar"></i>
                                            </div>
                                        </div>
                                        <div class="p-6">
                                            <h3 class="mb-4 text-2xl font-bold text-primary dark:text-primary-400">
                                                {{ number_format($data->subMonthValue, '2', ',', '.') }}

                                            </h3>
                                            {{-- <h5 class="mb-4 text-lg font-medium">Projects</h5> --}}
                                            <p class="text-neutral-500 dark:text-neutral-300">
                                                Mês passado.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-8 lg:mb-2">
                                    <div
                                        class="block h-full rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                                        <div class="flex justify-center">
                                            <div
                                                class="inline-block p-4 -mt-8 text-red-600 rounded-full shadow-md bg-primary-100">
                                                <i class="fa-solid fa-triangle-exclamation"></i>
                                            </div>
                                        </div>
                                        <div class="p-6">
                                            <h3 class="mb-4 text-2xl font-bold text-primary dark:text-primary-400">

                                                {{ number_format($data->isLate, '2', ',', '.') }}
                                            </h3>
                                            {{--   <h5 class="mb-4 text-lg font-medium">Growth</h5> --}}
                                            <p class="text-neutral-500 dark:text-neutral-300">
                                                Em Aberto
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section>
                            <div class="w-full">
                                <div class="p-6">



                                    <div>
                                        <div class="mb-4">

                                            <div>
                                                <div class="flex justify-between mt-3">
                                                    <input type="text" class=" input" style="max-width: 200px"
                                                        placeholder="Referencia" wire:model.live='searchTerms' />
                                                    <button type="button"
                                                        class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800'"
                                                        data-te-toggle="modal" data-te-target="#filters"
                                                        data-te-ripple-init data-te-ripple-color="light">
                                                        Filtrar
                                                    </button>
                                                </div>
                                                <div class="flex flex-col overflow-x-auto">

                                                    <div class="sm:-mx-6 lg:-mx-8">
                                                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                                            <div
                                                                class="overflow-x-auto sm:max-w-[473.6px] md:max-w-full">
                                                                <div class="overflow-x-auto overflow-y-auto">
                                                                    <table class="min-w-full font-light text-left">
                                                                        <thead
                                                                            class="text-sm font-medium border-b dark:border-neutral-500">
                                                                            <tr>

                                                                                <th scope="col"
                                                                                    wire:click="toggleOrderBy('id')"
                                                                                    class="px-6 py-4 text-center">
                                                                                    <span role="button">
                                                                                        Referencia</span>
                                                                                </th>
                                                                                <th scope="col"
                                                                                    class="px-6 py-4 text-center">

                                                                                    Cliente
                                                                                </th>
                                                                                <th scope="col"
                                                                                    wire:click="toggleOrderBy('service_type_id')"
                                                                                    class="px-6 py-4 text-center">
                                                                                    <span role="button">Serviço</span>
                                                                                </th>
                                                                                <th scope="col"
                                                                                    wire:click="toggleOrderBy('service_value')"
                                                                                    class="px-6 py-4 text-center">
                                                                                    <span role="button"> Valor</span>
                                                                                </th>
                                                                                <th scope="col"
                                                                                    wire:click="toggleOrderBy('discount')"
                                                                                    class="px-6 py-4 text-center">
                                                                                    <span role="button">
                                                                                        Desconto</span>
                                                                                </th>
                                                                                <th scope="col"
                                                                                    wire:click="toggleOrderBy('additional_expenses')"
                                                                                    class="px-6 py-4 text-center">
                                                                                    <span role="button">
                                                                                        Adicional</span>
                                                                                </th>
                                                                                <th scope="col"
                                                                                    wire:click="toggleOrderBy('net_total')"
                                                                                    class="px-6 py-4 text-center">
                                                                                    <span role="button"> Total</span>
                                                                                </th>
                                                                                <th scope="col"
                                                                                    wire:click="toggleOrderBy('payment_method_id')"
                                                                                    class="px-6 py-4 text-center">
                                                                                    <span role="button">Método
                                                                                        Pag.</span>
                                                                                </th>

                                                                                <th scope="col"
                                                                                    wire:click="toggleOrderBy('created_at')"
                                                                                    class="px-6 py-4 text-center">
                                                                                    <span role="button"> Data</span>
                                                                                </th>
                                                                                <th scope="col"
                                                                                    wire:click="toggleOrderBy('is_paid')"
                                                                                    class="px-6 py-4 text-center">
                                                                                    <span role="button">Status</span>
                                                                                </th>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody class="text-xs">

                                                                            @if (count($finances) == 0)
                                                                                <tr
                                                                                    class="text-center transition duration-300 ease-in-out border-b hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                                                                    <td class="px-6 py-4 font-medium whitespace-nowrap"
                                                                                        colspan="100%">Sem
                                                                                        registros
                                                                                        para {{ $targetDate }}
                                                                                    </td>
                                                                                </tr>
                                                                            @else
                                                                                @foreach ($finances as $item)
                                                                                    <tr
                                                                                        class="transition duration-300 ease-in-out border-b hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">


                                                                                        <td
                                                                                            class="px-6 py-4 text-center whitespace-nowrap">
                                                                                            {{ $item->serviceReference->reference }}
                                                                                        </td>
                                                                                        <td
                                                                                            class="px-6 py-4 text-center whitespace-nowrap">
                                                                                            {{ Illuminate\Support\Str::limit($item->user->name, 10, '...') }}

                                                                                        </td>
                                                                                        <td
                                                                                            class="px-6 py-4 text-center whitespace-nowrap">
                                                                                            {{ $item->serviceType->name }}

                                                                                        </td>
                                                                                        <td
                                                                                            class="px-6 py-4 text-center whitespace-nowrap">
                                                                                            {{ number_format($item->service_value, '2', ',', '.') }}
                                                                                        </td>
                                                                                        <td
                                                                                            class="px-6 py-4 text-center whitespace-nowrap">
                                                                                            {{ number_format($item->discount, '2', ',', '.') }}
                                                                                        </td>
                                                                                        <td
                                                                                            class="px-6 py-4 text-center whitespace-nowrap">
                                                                                            {{ number_format($item->additional_expenses, '2', ',', '.') }}
                                                                                        </td>
                                                                                        <td
                                                                                            class="px-6 py-4 text-center whitespace-nowrap">
                                                                                            {{ number_format($item->net_total, '2', ',', '.') }}
                                                                                        </td>
                                                                                        <td
                                                                                            class="px-6 py-4 text-center whitespace-nowrap">
                                                                                            @if ($item->payment_method_id)
                                                                                                {{ $item->paymentMethod->name }}
                                                                                            @else
                                                                                                ------
                                                                                            @endif


                                                                                        </td>

                                                                                        <td
                                                                                            class="px-6 py-4 text-center whitespace-nowrap">
                                                                                            {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}
                                                                                        </td>
                                                                                        <td
                                                                                            class="px-6 py-4 text-center whitespace-nowrap">
                                                                                            @if ($item->is_paid)
                                                                                                <span
                                                                                                    class="inline-block whitespace-nowrap rounded-[0.27rem] bg-success-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[1.5em] font-bold leading-none text-success-700">
                                                                                                    <i
                                                                                                        class="fa-solid fa-check-double"></i>
                                                                                                </span>
                                                                                            @else
                                                                                                <span role="button"
                                                                                                    class="inline-block whitespace-nowrap rounded-[0.27rem] bg-danger-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[1.5em] font-bold leading-none text-danger-700"
                                                                                                    data-te-toggle="tooltip"
                                                                                                    data-te-placement="top"
                                                                                                    data-te-ripple-init
                                                                                                    data-te-ripple-color="light"
                                                                                                    title="Receber">
                                                                                                    <i
                                                                                                        class="fa-solid fa-cash-register"></i>
                                                                                                </span>
                                                                                            @endif
                                                                                        </td>

                                                                                    </tr>
                                                                                @endforeach
                                                                            @endif
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="mt-3">
                                                                {{--  {{ $finances->links() }} --}}
                                                            </div>

                                                        </div>
                                                    </div>



                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </section>

                    </div>


                </div>
            </div>
        </div>



    </div>
    {{-- Modais --}}


    <div wire:ignore.defer data-te-modal-init
        class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
        id="filters" tabindex="-1" aria-labelledby="filtersLabel" aria-modal="true" role="dialog">
        <div data-te-modal-dialog-ref
            class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px] min-[992px]:max-w-[800px]">
            <div
                class="relative flex flex-col w-full text-current bg-white border-none rounded-md shadow-lg outline-none pointer-events-auto bg-clip-padding dark:bg-neutral-600">
                <div
                    class="flex items-center justify-between flex-shrink-0 p-4 border-b-2 border-opacity-100 rounded-t-md border-neutral-100 dark:border-opacity-50">
                    <!--Modal title-->
                    <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                        id="filtersLabel">
                        Filtrar
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
                <form wire:submit='getFilters'>
                    <!--Modal body-->
                    <div class="relative flex-auto p-4 text-neutral-800 dark:text-neutral-200" data-te-modal-body-ref>
                        <div class="flex flex-col">
                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">

                                    <div class="overflow-hidden">
                                        <table class="min-w-full text-sm font-light text-center">
                                            <thead
                                                class="font-medium border-b bg-neutral-50 dark:border-neutral-500 dark:text-neutral-800">
                                                <tr>

                                                    <th scope="col" class="px-6 py-4 ">Coluna</th>
                                                    <th scope="col" class="px-6 py-4 ">Filtro</th>
                                                    <th scope="col" class="px-6 py-4 ">Termo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="border-b dark:border-neutral-500">

                                                    <td class="px-6 py-4 whitespace-nowrap">Cliente</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <select id="customer-filter" class="input text-neutral-700"
                                                            wire:model='filters.customer.filter'>
                                                            <option value="">selecione</option>
                                                            <option value="=">igual a</option>
                                                            <option value="LIKE">contém</option>
                                                            <option value=">">maior que</option>
                                                            <option value=">=">maior ou igual a</option>
                                                            <option value="<">menor que</option>
                                                            <option value="<=">menor ou igual a</option>
                                                        </select>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <input type="text" id="customer-label" class="input"
                                                            wire:model.live='filters.customer.term' />
                                                    </td>
                                                </tr>
                                                <tr class="border-b dark:border-neutral-500">

                                                    <td class="px-6 py-4 whitespace-nowrap">Serviço</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <select id="service_type-filter"
                                                            class="input text-neutral-700"
                                                            wire:model.live='filters.service_reference_id.filter'>
                                                            <option value="">selecione</option>
                                                            <option value="=">igual a</option>
                                                            <option value="!=">diferente de</option>

                                                        </select>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">

                                                        <select id="service_type-label" class="input text-neutral-700"
                                                            wire:model.live='filters.service_reference_id.term'>
                                                            <option value="">selecione</option>
                                                            @foreach ($services as $item)
                                                                <option value="{{ $item->id }}">
                                                                    {{ $item->name }}</option>
                                                            @endforeach



                                                        </select>


                                                    </td>
                                                </tr>
                                                <tr class="border-b dark:border-neutral-500">

                                                    <td class="px-6 py-4 whitespace-nowrap">Valor</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <select id="service_value-filter"
                                                            class="input text-neutral-700"
                                                            wire:model='filters.service_value.filter'>
                                                            <option value="">selecione</option>
                                                            <option value="=">igual a</option>
                                                            <option value="LIKE">contém</option>
                                                            <option value=">">maior que</option>
                                                            <option value=">=">maior ou igual a</option>
                                                            <option value="<">menor que</option>
                                                            <option value="<=">menor ou igual a</option>
                                                        </select>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <input type="text" id="service_value-label" class="input"
                                                            wire:model.live='filters.service_value.term'
                                                            onkeydown="validePriceInput(event)" />
                                                    </td>
                                                </tr>
                                                <tr class="border-b dark:border-neutral-500">

                                                    <td class="px-6 py-4 whitespace-nowrap">Desconto</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <select id="discount-filter" class="input text-neutral-700"
                                                            wire:model='filters.discount.filter'>
                                                            <option value="">selecione</option>
                                                            <option value="=">igual a</option>
                                                            <option value="LIKE">contém</option>
                                                            <option value=">">maior que</option>
                                                            <option value=">=">maior ou igual a</option>
                                                            <option value="<">menor que</option>
                                                            <option value="<=">menor ou igual a</option>
                                                        </select>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <input type="text" id="discount-label" class="input"
                                                            wire:model.live='filters.discount.term'
                                                            onkeydown="validePriceInput(event)" />
                                                    </td>
                                                </tr>
                                                <tr class="border-b dark:border-neutral-500">

                                                    <td class="px-6 py-4 whitespace-nowrap">Adicional</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <select id="additional_expenses-filter"
                                                            class="input text-neutral-700"
                                                            wire:model='filters.additional_expenses.filter'>
                                                            <option value="">selecione</option>
                                                            <option value="=">igual a</option>
                                                            <option value="LIKE">contém</option>
                                                            <option value=">">maior que</option>
                                                            <option value=">=">maior ou igual a</option>
                                                            <option value="<">menor que</option>
                                                            <option value="<=">menor ou igual a</option>
                                                        </select>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <input type="text" id="additional_expenses-label"
                                                            class="input"
                                                            wire:model.live='filters.additional_expenses.term'
                                                            onkeydown="validePriceInput(event)" />
                                                    </td>
                                                </tr>

                                                <tr class="border-b dark:border-neutral-500">

                                                    <td class="px-6 py-4 whitespace-nowrap">Total</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <select id="net_total-filter" class="input text-neutral-700"
                                                            wire:model='filters.net_total.filter'>
                                                            <option value="">selecione</option>
                                                            <option value="=">igual a</option>
                                                            <option value="LIKE">contém</option>
                                                            <option value=">">maior que</option>
                                                            <option value=">=">maior ou igual a</option>
                                                            <option value="<">menor que</option>
                                                            <option value="<=">menor ou igual a</option>
                                                        </select>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <input type="text" id="net_total-label" class="input"
                                                            wire:model.live='filters.net_total.term'
                                                            onkeydown="validePriceInput(event)" />
                                                    </td>
                                                </tr>
                                                <tr class="border-b dark:border-neutral-500">

                                                    <td class="px-6 py-4 whitespace-nowrap">Método de Pagamento</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <select id="payment_method_id-filter"
                                                            class="input text-neutral-700"
                                                            wire:model.live='filters.payment_method_id.filter'>
                                                            <option value="">selecione</option>
                                                            <option value="=">igual a</option>
                                                            <option value="!=">diferente de</option>

                                                        </select>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">

                                                        <select id="payment_method_id-label"
                                                            class="input text-neutral-700"
                                                            wire:model.live='filters.payment_method_id.term'>
                                                            <option value="">selecione</option>
                                                            @foreach ($methodPay as $item)
                                                                <option value="{{ $item->id }}">
                                                                    {{ $item->name }}</option>
                                                            @endforeach



                                                        </select>


                                                    </td>
                                                </tr>
                                                <tr class="border-b dark:border-neutral-500">

                                                    <td class="px-6 py-4 whitespace-nowrap">Status</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <select id="is_paid-filter" class="input text-neutral-700"
                                                            wire:model.live='filters.is_paid.filter'>
                                                            <option value="">selecione</option>
                                                            <option value="=">igual a</option>
                                                            <option value="!=">diferente de</option>

                                                        </select>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">

                                                        <select id="is_paid-label" class="input text-neutral-700"
                                                            wire:model.live='filters.is_paid.term'>
                                                            <option value="">selecione</option>
                                                            <option value="1">Pago</option>
                                                            <option value="0">Em Aberto</option>


                                                        </select>


                                                    </td>
                                                </tr>
                                                <tr class="border-b dark:border-neutral-500">

                                                    <td class="px-6 py-4 whitespace-nowrap">Data Inicial</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <select id="start-date-filter" class="input text-neutral-700"
                                                            wire:model.live='filters.start.filter'>
                                                            <option value="">selecione</option>
                                                            <option value="=">igual a</option>
                                                            <option value=">">maior que</option>
                                                            <option value=">=">maior ou igual a</option>
                                                            <option value="<">menor que</option>
                                                            <option value="<=">menor ou igual a</option>
                                                        </select>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap"> <input type="date"
                                                            class="input" id="start-date-label"
                                                            wire:model.live='filters.start.term' /></td>
                                                </tr>
                                                <tr class="border-b dark:border-neutral-500">

                                                    <td class="px-6 py-4 whitespace-nowrap">Data Final</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <select id="end-date-filter" class="input text-neutral-700"
                                                            wire:model.live='filters.end.filter'>
                                                            <option value="">selecione</option>
                                                            <option value="=">igual a</option>
                                                            <option value=">">maior que</option>
                                                            <option value=">=">maior ou igual a</option>
                                                            <option value="<">menor que</option>
                                                            <option value="<=">menor ou igual a</option>
                                                        </select>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap"> <input type="date"
                                                            class="input" id="end-date-label"
                                                            wire:model.live='filters.end.term' /></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Modal footer-->
                    <div
                        class="flex flex-wrap items-center justify-end flex-shrink-0 p-4 border-t-2 border-opacity-100 rounded-b-md border-neutral-100 dark:border-opacity-50">

                        <x-secondary-button wire:click="clearFilters" type='reset'>
                            {{ __('Limpar Filtros') }}
                        </x-secondary-button>
                        <div style="width: 10px"></div>
                        <x-secondary-button type='reset' data-te-modal-dismiss data-te-ripple-init
                            data-te-ripple-color="light">
                            {{ __('Cancelar') }}
                        </x-secondary-button>

                        <x-primary-button class="ml-3" type='submit' data-te-modal-dismiss data-te-ripple-init
                            data-te-ripple-color="light">
                            {{ __('Filtrar') }}
                        </x-primary-button>
                    </div>
                </form>
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
