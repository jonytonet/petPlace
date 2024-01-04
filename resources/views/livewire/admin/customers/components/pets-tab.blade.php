<div>
    <div class="sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-x-auto sm:max-w-[473.6px] md:max-w-full">
                <div class="overflow-y-auto max-h-500">
                    <table class="min-w-full font-light text-left">
                        <thead class="text-sm font-medium border-b dark:border-neutral-500">
                            <tr>

                                <th scope="col" class="px-6 py-4 text-center">
                                    <span role="button">#</span>
                                </th>
                                <th scope="col" class="px-6 py-4 text-center">
                                    <span role="button" >Nome</span>
                                </th>
                                <th scope="col" class="px-6 py-4 text-center">
                                    <span role="button">Especie</span>
                                </th>
                                <th scope="col" class="px-6 py-4 text-center">
                                    <span role="button">Raça</span>
                                </th>
                                <th scope="col" class="px-6 py-4 text-center">
                                    Nascimento</th>
                                <th scope="col" class="px-6 py-4 text-center">Detalhes
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-xs">
                            @foreach ($pets as $item)
                                <tr
                                    class="transition duration-300 ease-in-out border-b hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">

                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        @if ($item->image)
                                            <img src="{{ asset('storage/' . $item->image) }}"
                                                class="mx-auto mb-4 border-4 rounded-full shadow-lg dark:shadow-black/20"
                                                alt="" style="max-width: 100px" />
                                        @else
                                            <img src="{{ asset('assets/images/canva.png') }}"
                                                class="mx-auto mb-4 border-4 rounded-full shadow-lg dark:shadow-black/20"
                                                alt="" style="max-width: 100px" />
                                        @endif

                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        {{ $item->name }}
                                    </td>

                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        {{ $item->specie->name }}

                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        {{ $item->breed->name }}
                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        {{ \Carbon\Carbon::parse($item->date_of_birth)->format('d/m/Y') }}
                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <x-secondary-button wire:click="goToPet({{ $item->id }})">
                                            <i class="fas fa-binoculars"></i>
                                        </x-secondary-button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
</div>
