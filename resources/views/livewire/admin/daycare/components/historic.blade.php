<div>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" />
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                    <div class="flex justify-between">
                        <div class="mb-4">
                            <h6><span>DayCare Histórico</span></h6>
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

                                    </div>
                                    <button type="button" wire:click=""
                                        class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-700 dark:hover-bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active-bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800'"
                                        data-te-toggle="modal" data-te-target="#" data-te-ripple-init
                                        data-te-ripple-color="light">Filtros</button>
                                </div>


                                <div class="sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                        <div class="overflow-x-auto sm:max-w-[473.6px] md:max-w-full">
                                            <div class="overflow-y-auto max-h-500">
                                                <table class="min-w-full font-light text-left">
                                                    <thead class="text-sm font-medium border-b dark:border-neutral-500">
                                                        <tr>
                                                            <th scope="col" class="px-6 py-4"><span
                                                                    role="button">Data</span></th>
                                                            <th scope="col" class="px-6 py-4"><span
                                                                    role="button">Pet</span></th>
                                                            <th scope="col" class="px-6 py-4"><span
                                                                    role="button">Entrada</span></th>
                                                            <th scope="col" class="px-6 py-4 text-center"><span
                                                                    role="button">Saida</span></th>
                                                            <th scope="col" class="px-6 py-4 text-center"><span
                                                                    role="button">Período</span></th>
                                                            <th scope="col" class="px-6 py-4 text-center"><span
                                                                    role="button">Atraso</span></th>
                                                            <th scope="col" class="px-6 py-4"><span
                                                                    role="button">Almoço</span></th>
                                                            <th scope="col" class="px-6 py-4"><span
                                                                    role="button">Observação</span></th>
                                                            <th scope="col" class="px-6 py-4 text-end">Ações
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-xs">
                                                        @foreach ($historics as $historic)
                                                            <tr
                                                                class="transition duration-300 ease-in-out border-b hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                                                <td class="px-6 py-4 font-medium whitespace-nowrap">
                                                                    {{ \Carbon\Carbon::parse($historic->date)->format('d/m/Y') }}
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    {{ $historic->pet->name }} -
                                                                    {{ Illuminate\Support\Str::limit($historic->pet->user->name, 15) }}
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    {{ $historic->entry_time }}</td>
                                                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                                                    {{ $historic->exit_time }}
                                                                </td>
                                                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                                                    {{ $historic->period }}H
                                                                </td>
                                                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                                                    @if (!$historic->extra_time)
                                                                        Sem atraso
                                                                    @else
                                                                        {{ $historic->extra_time }} min.
                                                                    @endif
                                                                </td>
                                                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                                                    {{ $historic->lunch_time }}
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <span data-te-ripple-init
                                                                        data-te-ripple-color="light"
                                                                        title="{{ $historic->notes }}"
                                                                        data-te-toggle="tooltip">
                                                                        {{ Illuminate\Support\Str::limit($historic->notes, 10, '...') }}</span>
                                                                </td>
                                                                <td class="px-6 py-4 text-end whitespace-nowrap">
                                                                    <x-primary-button
                                                                        wire:click="editHistoric({{ $historic->id }})"
                                                                        data-te-toggle="modal"
                                                                        data-te-target="#edit-historic"
                                                                        data-te-ripple-init
                                                                        data-te-ripple-color="light">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </x-primary-button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            {{ $historics->links() }}
                                        </div>

                                    </div>
                                </div>
                                <div wire:ignore.defer data-te-modal-init
                                    class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                                    id="edit-historic" tabindex="-1" aria-labelledby="edit-historicLabel"
                                    aria-modal="true" role="dialog">
                                    <div data-te-modal-dialog-ref
                                        class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px] min-[992px]:max-w-[800px]">
                                        <div
                                            class="relative flex flex-col w-full text-current bg-white border-none rounded-md shadow-lg outline-none pointer-events-auto bg-clip-padding dark:bg-neutral-600">
                                            <div
                                                class="flex items-center justify-between flex-shrink-0 p-4 border-b-2 border-opacity-100 rounded-t-md border-neutral-100 dark:border-opacity-50">
                                                <!--Modal title-->
                                                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                                                    id="edit-historicLabel">
                                                    Editar Histórico
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
                                                <div class="mb-4">
                                                    <label for="entry-time"
                                                        class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Entrada</label>
                                                    <input type="time" class="input" id="entry-time"
                                                        wire:model='entryTime' />
                                                </div>
                                                <div class="mb-4">
                                                    <label for="exit-time"
                                                        class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Entrada</label>
                                                    <input type="time" class="input" id="exit-time"
                                                        wire:model='exitTime' />
                                                </div>
                                                <div class="mb-4" id="single-daily" style="display: none">
                                                    <label for="period"
                                                        class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Período</label>
                                                    <select id="period" class="input text-neutral-700"
                                                        wire:model='period'>
                                                        <option value="">Selecione</option>
                                                        <option value="6">6h</option>
                                                        <option value="12">12h</option>
                                                    </select>
                                                </div>

                                                <div class="mb-4">
                                                    <label for="lunch-time"
                                                        class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Almoço</label>
                                                    <input type="time" class="input" id="lunch-time"
                                                        wire:model='lunchTime' />
                                                </div>
                                                <div class="mb-4">
                                                    <textarea class="input" id="booking-notes" wire:model='notes' rows="5"></textarea>
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

                                                    <x-primary-button class="ml-3" type='button'
                                                        data-te-modal-dismiss data-te-ripple-init
                                                        data-te-ripple-color="light" wire:click='updateHistoric'>
                                                        {{ __('Salvar') }} <div wire:loading='updateHistoric'
                                                            class="inline-block h-3 w-3 animate-spin rounded-full border-2 border-solid border-current border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite]"
                                                            role="status">
                                                            <span
                                                                class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
                                                        </div>
                                                    </x-primary-button>
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

            @this.on('edit-historic', (event) => {
                console.log(event);
                document.getElementById("booking-notes").value = event[0]['notes'];
                document.getElementById("entry-time").value = event[0]['entryTime'];
                document.getElementById("exit-time").value = event[0]['exitTime'];
                document.getElementById("lunch-time").value = event[0]['lunchTime'];
                document.getElementById("period").value = event[0]['period'];
                if (event[0]['singleDaily'] == 1) {
                    document.getElementById("single-daily").style.display = 'block';
                }

            });
            @this.on('edit-historic-clear', (event) => {
                document.getElementById("booking-notes").value = '';
                document.getElementById("entry-time").value = '';
                document.getElementById("exit-time").value = '';
                document.getElementById("lunch-time").value = '';
                document.getElementById("period").value = '';
                document.getElementById("single-daily").style.display = 'none';

            });
        });
    </script>
</div>
</div>
