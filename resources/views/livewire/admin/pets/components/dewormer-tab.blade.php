<div>
    <!-- Container for demo purpose -->
    <div class="container mx-auto my-24 md:px-6">
        <!-- Section: Design Block -->
        <section class="mb-16 text-center">


            <div class="grid lg:grid-cols-3 lg:gap-x-12">
                <div class="mb-8 lg:mb-2">
                    <div
                        class="block h-full rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                        <div class="flex justify-center">
                            <div class="inline-block p-4 -mt-8 rounded-full shadow-md bg-primary-100 text-primary">
                                <i class="fa-solid fa-book-bookmark"></i>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="mb-4 text-2xl font-bold text-primary dark:text-primary-400">


                            </h3>
                            {{--  <h5 class="mb-4 text-lg font-medium">Components</h5> --}}
                            <p class="text-neutral-500 dark:text-neutral-300">
                                Dias pendentes no pacote.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mb-8 lg:mb-2">
                    <div
                        class="block h-full rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                        <div class="flex justify-center">
                            <div class="inline-block p-4 -mt-8 rounded-full shadow-md bg-primary-100 text-primary">
                                <i class="fa-solid fa-dog"></i>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="mb-4 text-2xl font-bold text-primary dark:text-primary-400">

                            </h3>
                            {{-- <h5 class="mb-4 text-lg font-medium">Growth</h5> --}}
                            <p class="text-neutral-500 dark:text-neutral-300">
                                Total dias.
                            </p>
                        </div>
                    </div>
                </div>

                {{--  <div class="mb-8 lg:mb-2">
                    <div
                        class="block h-full rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                        <div class="flex justify-center">
                            <div class="inline-block p-4 -mt-8 rounded-full shadow-md bg-primary-100 text-primary">
                                <i class="fa-solid fa-money-check-dollar"></i>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="mb-4 text-2xl font-bold text-primary dark:text-primary-400">
                                @if ($enrollmentActive)
                                      R${{ number_format($baths->sum('service_value'), 2, ',', '.') }}
                                @else
                                    R$ 0,00
                                @endif

                            </h3>
                           <h5 class="mb-4 text-lg font-medium">Projects</h5>
                            <p class="text-neutral-500 dark:text-neutral-300">
                                Total valor.
                            </p>
                        </div>
                    </div>
                </div> --}}
                <div class="mb-8 lg:mb-2">
                    <div
                        class="block h-full rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                        <div class="flex justify-center">
                            <div class="inline-block p-4 -mt-8 rounded-full shadow-md bg-primary-100 text-primary">
                                <i class="fa-solid fa-sun"></i>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="mb-4 text-2xl font-bold text-primary dark:text-primary-400">



                            </h3>
                            {{--   <h5 class="mb-4 text-lg font-medium">Growth</h5> --}}
                            <p class="text-neutral-500 dark:text-neutral-300">
                                Ultimo uso.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section: Design Block -->
        <section>
            <div class="w-full">
                <div class="p-6">

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-2">
                        <div>
                            <div class="mb-4">
                                <div class="flex justify-between mb-2">
                                    <h6>Antiparasitários </h6>
                                    <x-primary-button data-te-ripple-init data-te-ripple-color="light"
                                        data-te-toggle="modal" data-te-target="#add-dewormer-modal">
                                        <i class="fa-solid fa-circle-plus"></i> Novo
                                    </x-primary-button>
                                </div>
                                <hr>
                                <div>
                                    <div class="flex flex-col ">
                                        {{--  <div class="flex justify-between mt-3">
                                            <input type="text" class=" input" style="max-width: 200px"
                                                placeholder="Pesquise" wire:model.live='' />
                                        </div> --}}
                                        {{-- <div class="sm:-mx-6 lg:-mx-8">
                                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                                <div class="overflow-x-auto sm:max-w-[473.6px] md:max-w-full">
                                                    <div class="overflow-y-auto max-h-500">
                                                        <table class="min-w-full font-light text-left">
                                                            <thead
                                                                class="text-sm font-medium border-b dark:border-neutral-500">
                                                                <tr>

                                                                    <th scope="col" class="px-6 py-4 text-center">
                                                                        <span role="button">Data</span>
                                                                    </th>
                                                                    <th scope="col" class="px-6 py-4 text-center">
                                                                        <span role="button">Períod</span>
                                                                    </th>
                                                                    <th scope="col" class="px-6 py-4 text-center">
                                                                        <span role="button">Ent</span>
                                                                    </th>
                                                                    <th scope="col" class="px-6 py-4 text-center">
                                                                        <span role="button">Saida</span>
                                                                    </th>
                                                                    <th scope="col" class="px-6 py-4 text-center">
                                                                        Extra</th>
                                                                    <th scope="col" class="px-6 py-4 text-center">
                                                                        Tipo</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="text-xs">
                                                                @foreach ($bookings as $item)
                                                                    <tr
                                                                        class="transition duration-300 ease-in-out border-b hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">

                                                                        <td
                                                                            class="px-6 py-4 text-center whitespace-nowrap">
                                                                            {{ \Carbon\Carbon::parse($item->date)->format('d/m/Y') }}
                                                                        </td>
                                                                        <td
                                                                            class="px-6 py-4 text-center whitespace-nowrap">
                                                                            {{ $item->period }}h
                                                                        </td>
                                                                        <td
                                                                            class="px-6 py-4 text-center whitespace-nowrap">
                                                                            {{ \Carbon\Carbon::parse($item->entry_time)->format('H:i') }}
                                                                        </td>
                                                                        <td
                                                                            class="px-6 py-4 text-center whitespace-nowrap">
                                                                            {{ \Carbon\Carbon::parse($item->exit_time)->format('H:i') }}
                                                                        </td>
                                                                        <td
                                                                            class="px-6 py-4 text-center whitespace-nowrap">
                                                                            @if ($item->extra_time)
                                                                                {{ $item->extra_time }} min
                                                                            @else
                                                                                0
                                                                            @endif

                                                                        </td>
                                                                        <td
                                                                            class="px-6 py-4 text-center whitespace-nowrap">
                                                                            @if ($item->is_single_daily)
                                                                                Av
                                                                            @else
                                                                                Pc
                                                                            @endif

                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    {{ $bookings->links() }}
                                                </div>

                                            </div>
                                        </div> --}}



                                    </div>

                                </div>

                            </div>

                        </div>
                        <div>
                            <div class="mb-4">

                                <div class="flex justify-between mb-2">
                                    <h6>Vacinas</h6>
                                    <x-primary-button data-te-ripple-init data-te-ripple-color="light"
                                        data-te-toggle="modal" data-te-target="#add-vaccine-modal">
                                        <i class="fa-solid fa-circle-plus"></i> Novo
                                    </x-primary-button>
                                </div>
                                <hr>
                                <div>
                                    <div class="flex flex-col ">
                                        {{--  <div class="flex justify-between mt-3">
                                            <input type="text" class=" input" style="max-width: 200px"
                                                placeholder="Pesquise" wire:model.live='' />
                                        </div> --}}
                                        {{--  <div class="sm:-mx-6 lg:-mx-8">
                                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                                <div class="overflow-x-auto sm:max-w-[473.6px] md:max-w-full">
                                                    <div class="overflow-y-auto max-h-500">
                                                        <table class="min-w-full font-light text-left">
                                                            <thead
                                                                class="text-sm font-medium border-b dark:border-neutral-500">
                                                                <tr>

                                                                    <th scope="col" class="px-6 py-4 text-center">
                                                                        <span role="button">#</span>
                                                                    </th>
                                                                    <th scope="col" class="px-6 py-4 text-center">
                                                                        <span role="button">Dias</span>
                                                                    </th>

                                                                    <th scope="col" class="px-6 py-4 text-center">
                                                                        Período</th>
                                                                    <th scope="col" class="px-6 py-4 text-center">
                                                                        Valor</th>
                                                                    <th scope="col" class="px-6 py-4 text-center">
                                                                        Data Pagamento</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody class="text-xs">
                                                                @foreach ($monthlyPayments as $item)
                                                                    <tr
                                                                        class="transition duration-300 ease-in-out border-b hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">

                                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                                            {{ $item->daycareEnrollment->id }}
                                                                        </td>
                                                                        <td
                                                                            class="px-6 py-4 text-center whitespace-nowrap">
                                                                            {{ $item->daycareEnrollment->daycarePlan->days }}
                                                                        </td>
                                                                        <td
                                                                            class="px-6 py-4 text-center whitespace-nowrap">
                                                                            {{ $item->daycareEnrollment->daycarePlan->session_type }}h
                                                                        </td>

                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-end">
                                                                            R${{ number_format($item->daycareEnrollment->daycarePlan->price, 2, ',', '.') }}
                                                                        </td>
                                                                        <td
                                                                            class="px-6 py-4 text-center whitespace-nowrap ">
                                                                            {{ \Carbon\Carbon::parse($item->pay_day)->format('d/m/Y') }}
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
                                        </div> --}}



                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
    {{-- Antipulgas --}}
    <div>
        <div wire:ignore.defer data-te-modal-init
            class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
            id="add-dewormer-modal" tabindex="-1" aria-labelledby="add-dewormer-modalLabel" aria-modal="true"
            role="dialog">
            <div data-te-modal-dialog-ref
                class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px] min-[992px]:max-w-[800px]">
                <div
                    class="relative flex flex-col w-full text-current bg-white border-none rounded-md shadow-lg outline-none pointer-events-auto bg-clip-padding dark:bg-neutral-600">
                    <div
                        class="flex items-center justify-between flex-shrink-0 p-4 border-b-2 border-opacity-100 rounded-t-md border-neutral-100 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                            id="add-dewormer-modalLabel">
                            Adicione Antiparasitário
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
                    <form wire:submit='createdDewormer'>
                        <!--Modal body-->
                        <div class="relative flex-auto p-4" data-te-modal-body-ref>
                            <div class="relative flex-auto p-4" data-te-modal-body-ref>
                                <div class="mb-4">
                                    <label for="pet"
                                        class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Veterinário(a)</label>
                                    <select class="input" wire:model='dewormer,veterinarian_id'
                                        id="veterinary-dewormer">
                                        <option value="">Selecione</option>
                                        @foreach ($veterinaries as $veterinary)
                                            <option value="{{ $veterinary->id }}">{{ $veterinary->id }} -
                                                {{ $veterinary->name }}</option>
                                        @endforeach

                                    </select>

                                </div>

                                <div class="mb-4">
                                    <label for="pet"
                                        class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Data da
                                        Administração</label>
                                    <input type="date" id="date-admin-dewormer" class="input"
                                        wire:model='dewormer.given_date' />
                                </div>
                                <div class="mb-4">
                                    <label for="pet"
                                        class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Reforço
                                        em</label>
                                    <input type="date" id="reinforcement_date-dewormer" class="input"
                                        wire:model='dewormer.reinforcement_date' />
                                </div>
                                <div class="mb-4">
                                    <label for="pet"
                                        class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Peso</label>
                                    <input type="text" id="weight-dewormer" class="input"
                                        wire:model='dewormer.weight' onkeydown="validePriceInput(event)" />
                                </div>
                                <div class="mb-4">
                                    <label for="pet"
                                        class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Medicamento</label>
                                    <input type="text" id="medication-dewormer" class="input"
                                        wire:model='dewormer.medication' />
                                </div>
                                <div class="mb-4">
                                    <label for="pet"
                                        class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Valor</label>
                                    <input type="text" id="value-dewormer" class="input"
                                        wire:model='dewormer.value' onfocus="this.select()"
                                        onkeydown="validePriceInput(event)" value="0.00" />
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
                                {{ __('Confirmar') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
    {{-- Vacinas --}}
    <div>
        <div wire:ignore.defer data-te-modal-init
            class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
            id="add-vaccine-modal" tabindex="-1" aria-labelledby="add-vaccine-modalLabel" aria-modal="true"
            role="dialog">
            <div data-te-modal-dialog-ref
                class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px] min-[992px]:max-w-[800px]">
                <div
                    class="relative flex flex-col w-full text-current bg-white border-none rounded-md shadow-lg outline-none pointer-events-auto bg-clip-padding dark:bg-neutral-600">
                    <div
                        class="flex items-center justify-between flex-shrink-0 p-4 border-b-2 border-opacity-100 rounded-t-md border-neutral-100 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                            id="add-vaccine-modalLabel">
                            Adicione Vacina
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
                    <form wire:submit='createdDewormer'>
                        <!--Modal body-->
                        <div class="relative flex-auto p-4" data-te-modal-body-ref>
                            <div class="relative flex-auto p-4" data-te-modal-body-ref>
                                <div class="mb-4">
                                    <label for="pet"
                                        class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Veterinário(a)</label>
                                    <select class="input" wire:model='vaccine.veterinarian_id'
                                        id="veterinary-vaccine">
                                        <option value="">Selecione</option>
                                        @foreach ($veterinaries as $veterinary)
                                            <option value="{{ $veterinary->id }}">{{ $veterinary->id }} -
                                                {{ $veterinary->name }}</option>
                                        @endforeach

                                    </select>

                                </div>
                                <div class="mb-4">
                                    <label for="pet"
                                        class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Vacina</label>
                                    <input type="text" id="name-vaccine" class="input"
                                        wire:model='vaccine.name' />
                                </div>
                                <div class="mb-4">
                                    <label for="pet"
                                        class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Tipo</label>
                                    <input type="text" id="type-vaccine" class="input"
                                        wire:model='vaccine.type' />
                                </div>

                                <div class="mb-4">
                                    <label for="pet"
                                        class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Data
                                        da
                                        Administração</label>
                                    <input type="date" id="application_date-vaccine" class="input"
                                        wire:model='vaccine.application_date' />
                                </div>
                                <div class="mb-4">
                                    <label for="pet"
                                        class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Reforço
                                        em</label>
                                    <input type="date" id="expiration_date-vaccine" class="input"
                                        wire:model='vaccine.expiration_date' />
                                </div>
                                <div class="mb-4">
                                    <label for="pet"
                                        class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Observações</label>
                                    <textarea id="notes-vaccine" class="input" wire:model='vaccine.notes'></textarea>
                                </div>

                                <div class="mb-4">
                                    <label for="pet"
                                        class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Valor</label>
                                    <input type="text" id="value-vaccine" class="input"
                                        wire:model='vaccine.value' onfocus="this.select()"
                                        onkeydown="validePriceInput(event)" value="0.00" />
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
                                {{ __('Confirmar') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>

</div>
