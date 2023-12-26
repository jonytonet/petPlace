<div>
    <div class="flex flex-col ">
        <div class="flex justify-between mt-3">
            <input type="text" class=" input" style="max-width: 300px" placeholder="Pesquise"
                wire:model.live='searchTerms' />

            <button type="button"
                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800'"
                data-te-toggle="modal" data-te-target="#filters" data-te-ripple-init data-te-ripple-color="light">
                Filtrar
            </button>


        </div>
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-x-auto">
                    <table class="min-w-full font-light text-left">
                        <thead class="text-sm font-medium border-b dark:border-neutral-500">
                            <tr>
                                <th scope="col" class="px-6 py-4"><span role="button"
                                        wire:click="toggleOrder('id')">#</span></th>
                                <th scope="col" class="px-6 py-4">Tutor</th>
                                <th scope="col" class="px-6 py-4"><span role="button"
                                        wire:click="toggleOrder('name')">Pet</span></th>
                                <th scope="col" class="px-6 py-4"><span role="button"
                                        wire:click="toggleOrder('species')">Tipo</span></th>
                                <th scope="col" class="px-6 py-4"><span role="button"
                                        wire:click="toggleOrder('breed')">Valor</span></th>
                                <th scope="col" class="px-6 py-4"><span role="button"
                                        wire:click="toggleOrder('gender')">Data</span></th>
                                <th scope="col" class="px-6 py-4"><span role="button"
                                        wire:click="toggleOrder('fur')">Hora</span></th>
                                <th scope="col" class="px-6 py-4">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="text-xs">
                            @if (count($bookings) == 0)
                                <tr
                                    class="text-center transition duration-300 ease-in-out border-b hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                    <td class="px-6 py-4 font-medium whitespace-nowrap" colspan="100%">Sem agendamentos
                                        para {{ $targetDate }}</td>
                                </tr>
                            @else
                                @foreach ($bookings as $item)
                                    <tr
                                        class="transition duration-300 ease-in-out border-b hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                        <td class="px-6 py-4 font-medium whitespace-nowrap">{{ $item->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ Illuminate\Support\Str::limit($item->pet->user->name, 10, '...') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->pet->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if ($item->bath_and_grooming_control_id)
                                                Pacote
                                            @else
                                                Avulso
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ number_format($item->service_value, 2, ',', '.') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ \Carbon\Carbon::parse($item->bath_date)->format('d/m/Y') }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ \Carbon\Carbon::parse($item->bath_time)->format('H:i') }}
                                        </td>


                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <x-secondary-button wire:click="goToShow({{ $item->id }})"
                                                data-te-ripple-init data-te-ripple-color="light" data-te-toggle="modal"
                                                data-te-target="#showBathBooking">
                                                <i class="fas fa-binoculars"></i>
                                            </x-secondary-button>
                                            <x-danger-button wire:click="setDestroyId({{ $item->id }})"
                                                data-te-toggle="modal" data-te-target="#exampleFrameTopModal"
                                                data-te-ripple-init data-te-ripple-color="light">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </x-danger-button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>

                </div>
                <div class="mt-3">
                    {{ $bookings->links() }}
                </div>
            </div>
        </div>
    </div>


    {{-- Modais --}}

    @livewire('admin.bath-and-grooming.control.modal-show-bath-service')


    <div data-te-modal-init wire:ignore.defer
        class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
        id="exampleFrameTopModal" tabindex="-1" aria-labelledby="exampleFrameTopModalLabel" aria-hidden="true">
        <div data-te-modal-dialog-ref
            class="pointer-events-none relative w-full translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out">
            <div
                class="relative flex flex-col w-full text-current bg-white border-none shadow-lg outline-none pointer-events-auto bg-clip-padding dark:bg-neutral-600">
                <div class="relative flex-auto py-1" data-te-modal-body-ref>
                    <div class="flex items-center justify-center my-4">

                        <p class="mx-6 my-4">
                            Tem certeza que deseja excluir esse agendamento?

                        </p>
                        <x-danger-button data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light" wire:click='destroy()'> Sim</x-danger-button> &nbsp; &nbsp;
                        <x-secondary-button data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                            {{ __('Não') }}
                        </x-secondary-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <form wire:submit='getFilters'>
                    <!--Modal body-->
                    <div class="relative flex-auto p-4" data-te-modal-body-ref>
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

                                                    <td class="px-6 py-4 whitespace-nowrap">Tutor</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <select id="tutor-filter" class="input text-neutral-700"
                                                            wire:model='filters.user.filter'>
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
                                                         <input type="text" id="tutor-label"
                                                            class="input" wire:model.live='filters.user.term' /></td>
                                                </tr>
                                                <tr class="border-b dark:border-neutral-500">

                                                    <td class="px-6 py-4 whitespace-nowrap">Pet</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <select id="pet-filter" class="input text-neutral-700"
                                                            wire:model.live='filters.pet.filter'>
                                                            <option value="">selecione</option>
                                                            <option value="=">igual a</option>
                                                            <option value="LIKE">contém</option>
                                                            <option value=">">maior que</option>
                                                            <option value=">=">maior ou igual a</option>
                                                            <option value="<">menor que</option>
                                                            <option value="<=">menor ou igual a</option>
                                                        </select>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap"> <input type="text" id='pet-label'
                                                            class="input" wire:model.live='filters.pet.term' />
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
</div>
