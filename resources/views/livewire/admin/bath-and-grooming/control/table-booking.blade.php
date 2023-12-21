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
                                    <td class="px-6 py-4 whitespace-nowrap">{{number_format($item->service_value, 2, ',', '.') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ \Carbon\Carbon::parse($item->bath_date)->format('d/m/Y') }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ \Carbon\Carbon::parse($item->bath_time)->format('H:i') }}
                                    </td>


                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <x-secondary-button wire:click="goToShow({{ $item->id }})">
                                            <i class="fas fa-binoculars"></i>
                                        </x-secondary-button>
                                        <x-danger-button wire:click="destroy({{ $item->id }})">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </x-danger-button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="mt-3">
                    {{ $bookings->links() }} F
                </div>
            </div>
        </div>
    </div>
</div>
