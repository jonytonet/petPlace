<div>
    <!-- Container for demo purpose -->
    <div class="container mx-auto my-24 md:px-6">
        <!-- Section: Design Block -->
        <section class="mb-16 text-center">


            <div class="grid lg:grid-cols-4 lg:gap-x-12">
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
                                @if ($activePlan)
                                    {{ $activePlan->baths_number_plan - $activePlan->baths_number_used }}
                                @else
                                    0
                                @endif

                            </h3>
                            {{--  <h5 class="mb-4 text-lg font-medium">Components</h5> --}}
                            <p class="text-neutral-500 dark:text-neutral-300">
                                Banhos pendentes no pacote.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mb-8 lg:mb-2">
                    <div
                        class="block h-full rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                        <div class="flex justify-center">
                            <div class="inline-block p-4 -mt-8 rounded-full shadow-md bg-primary-100 text-primary">
                                <i class="fa-solid fa-shower"></i>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="mb-4 text-2xl font-bold text-primary dark:text-primary-400">
                                {{ count($baths) }}
                            </h3>
                            {{-- <h5 class="mb-4 text-lg font-medium">Growth</h5> --}}
                            <p class="text-neutral-500 dark:text-neutral-300">
                                Banhos tomados.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mb-8 lg:mb-2">
                    <div
                        class="block h-full rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                        <div class="flex justify-center">
                            <div class="inline-block p-4 -mt-8 rounded-full shadow-md bg-primary-100 text-primary">
                                <i class="fa-solid fa-money-check-dollar"></i>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="mb-4 text-2xl font-bold text-primary dark:text-primary-400">
                                @if ($baths)
                                    R${{ number_format($baths->sum('service_value'), 2, ',', '.') }}
                                @else
                                    R$ 0,00
                                @endif

                            </h3>
                            {{-- <h5 class="mb-4 text-lg font-medium">Projects</h5> --}}
                            <p class="text-neutral-500 dark:text-neutral-300">
                                Total.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mb-8 lg:mb-2">
                    <div
                        class="block h-full rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                        <div class="flex justify-center">
                            <div class="inline-block p-4 -mt-8 rounded-full shadow-md bg-primary-100 text-primary">
                                <i class="fa-solid fa-bath"></i>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="mb-4 text-2xl font-bold text-primary dark:text-primary-400">
                                @if ($baths)
                                    {{ \Carbon\Carbon::parse($baths->last()->bath_date)->format('d/m/Y') }}
                                @else
                                    Nada Consta
                                @endif


                            </h3>
                            {{--   <h5 class="mb-4 text-lg font-medium">Growth</h5> --}}
                            <p class="text-neutral-500 dark:text-neutral-300">
                                Ultimo banho.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="w-full">
                <div class="p-6">

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-2">
                        <div>
                            <div class="mb-4">
                                <h6>Banhos</h6>
                                <hr>
                                <div>
                                    <div class="flex flex-col ">
                                        {{--  <div class="flex justify-between mt-3">
                                            <input type="text" class=" input" style="max-width: 200px"
                                                placeholder="Pesquise" wire:model.live='' />
                                        </div> --}}
                                        <div class="sm:-mx-6 lg:-mx-8">
                                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                                <div class="overflow-x-auto sm:max-w-[473.6px] md:max-w-full">
                                                    <div class="overflow-y-auto max-h-500">
                                                        <table class="min-w-full font-light text-left">
                                                            <thead
                                                                class="text-sm font-medium border-b dark:border-neutral-500">
                                                                <tr>
                                                                    <th scope="col" class="px-6 py-4"><span
                                                                            role="button">#</span></th>
                                                                    <th scope="col" class="px-6 py-4 text-center">
                                                                        <span role="button">Data</span>
                                                                    </th>
                                                                    <th scope="col" class="px-6 py-4 text-center">
                                                                        <span role="button">Hora</span>
                                                                    </th>
                                                                    <th scope="col" class="px-6 py-4 text-center">
                                                                        Valor</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="text-xs">
                                                                @foreach ($baths as $item)
                                                                    <tr
                                                                        class="transition duration-300 ease-in-out border-b hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                                                        <td
                                                                            class="px-6 py-4 font-medium whitespace-nowrap">
                                                                            {{ $item->id }}</td>
                                                                        <td
                                                                            class="px-6 py-4 text-center whitespace-nowrap">
                                                                            {{ \Carbon\Carbon::parse($item->bath_date)->format('d/m/Y') }}
                                                                        </td>
                                                                        <td
                                                                            class="px-6 py-4 text-center whitespace-nowrap">
                                                                            {{ \Carbon\Carbon::parse($item->bath_time)->format('H:i') }}
                                                                        </td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-end">
                                                                            R${{ number_format($item->service_value, 2, ',', '.') }}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    {{ $baths->links() }}
                                                </div>

                                            </div>
                                        </div>



                                    </div>

                                </div>

                            </div>

                        </div>
                        <div>
                            <div class="mb-4">
                                <h6>Pacotes</h6>
                                <hr>
                                <div>
                                    <div class="flex flex-col ">
                                        {{--  <div class="flex justify-between mt-3">
                                            <input type="text" class=" input" style="max-width: 200px"
                                                placeholder="Pesquise" wire:model.live='' />
                                        </div> --}}
                                        <div class="sm:-mx-6 lg:-mx-8">
                                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                                <div class="overflow-x-auto sm:max-w-[473.6px] md:max-w-full">
                                                    <div class="overflow-y-auto max-h-500">
                                                        <table class="min-w-full font-light text-left">
                                                            <thead
                                                                class="text-sm font-medium border-b dark:border-neutral-500">
                                                                <tr>

                                                                    <th scope="col" class="px-6 py-4 text-center">
                                                                        <span role="button">N° Banhos</span>
                                                                    </th>
                                                                    <th scope="col" class="px-6 py-4 text-center">
                                                                        <span role="button">Usados</span>
                                                                    </th>
                                                                    <th scope="col" class="px-6 py-4 text-center">
                                                                        Valor</th>
                                                                    <th scope="col" class="px-6 py-4 text-center">
                                                                        Incio</th>
                                                                    <th scope="col" class="px-6 py-4 text-center">
                                                                        Validade</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="text-xs">
                                                                @foreach ($plans as $item)
                                                                    <tr
                                                                        class="transition duration-300 ease-in-out border-b hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">

                                                                        <td
                                                                            class="px-6 py-4 text-center whitespace-nowrap">
                                                                            {{ $item->baths_number_plan }}
                                                                        </td>
                                                                        <td
                                                                            class="px-6 py-4 text-center whitespace-nowrap">
                                                                            {{ $item->baths_number_used }}
                                                                        </td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-end">
                                                                            R${{ number_format($item->value, 2, ',', '.') }}
                                                                        </td>
                                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                                            {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}
                                                                        </td>
                                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                                            {{ \Carbon\Carbon::parse($item->created_at)->addDays($item->bathAndGroomingPlan->max_use_months * 30)->format('d/m/Y') }}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    {{ $plans->links() }}
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
        </section>

    </div>

</div>
