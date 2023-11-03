<div wire:poll.15s>
    <!-- Container for demo purpose -->
    <div class="container mx-auto my-24 md:px-6">
        <!-- Section: Design Block -->
        <section class="mb-32 text-center">
            <h2 class="mb-12 text-3xl font-bold">
                Diário de <u class="text-warning dark:text-warning-400">
                    Au<i class="fa-solid fa-dog"></i>lunos</u>
            </h2>

            <div class="grid lg:gap-xl-12 gap-x-6 md:grid-cols-3 xl:grid-cols-4">
                @foreach ($daycarePets as $daycarePet)
                    <div class="mb-12">
                        @if ($daycarePet->pet->image)
                            <img src="{{ asset('storage/' . $daycarePet->pet->image) }}"
                                class="mx-auto mb-4 border-4 @if ($daycarePet->isLate()) border-red-500
                                @else
                                border-green-500 @endif rounded-full shadow-lg dark:shadow-black/20"
                                alt="" style="max-width: 100px" />
                        @else
                            <img src="{{ asset('assets/images/canva.png') }}"
                                class="mx-auto mb-4 border-4 @if ($daycarePet->isLate()) border-red-500
                                @else
                                border-green-500 @endif  rounded-full shadow-lg dark:shadow-black/20"
                                alt="" style="max-width: 100px" />
                        @endif
                        <p class="mb-2 font-bold"> {{ $daycarePet->pet->name }}</p>
                        <p class="mb-2 font-bold" title="{{ $daycarePet->pet->user->name }}">
                            {{ Illuminate\Support\Str::limit($daycarePet->pet->user->name, 15) }}
                        </p>
                        <p class="text-neutral-500 dark:text-neutral-300">Entrada: {{ $daycarePet->entry_time }}</p>
                        <p class="text-neutral-500 dark:text-neutral-300">Saida:
                            @if ($daycarePet->exit_time)
                                {{ $daycarePet->exit_time }}
                            @else
                                {{ \Carbon\Carbon::createFromFormat('H:i:s', $daycarePet->entry_time)->addHours($daycarePet->period)->format('H:i:s') }}
                            @endif
                        </p>
                        @if ($daycarePet->extra_time)
                            <p class="text-red-500 dark:text-red-500">Atraso de: {{ $daycarePet->extra_time }} min
                            </p>
                        @elseif ($daycarePet->isLate())
                            <p class="text-red-500 dark:text-red-500">Atraso de: {{ $daycarePet->getDelayInMinutes() }}
                                min</p>
                        @endif
                        <div class="flex justify-center mt-4 space-x-4 text-center">
                            <button type="button" data-te-ripple-init data-te-ripple-color="light"
                                wire:click='getNote({{ $daycarePet->id }})' data-te-toggle="modal"
                                data-te-target="#note-daycare"
                                class="inline-block rounded-full  bg-primary dark:bg-transparent  p-2 uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                                <i class="fa-solid fa-clipboard-list " data-te-toggle="tooltip" data-te-placement="left"
                                    title="Observações"></i>
                            </button>
                            <button wire:click='checkLunchTime({{ $daycarePet->id }})'
                                @if ($daycarePet->lunch_time) disabled @endif type="button" data-te-ripple-init
                                data-te-ripple-color="light" title="Marcar Almoço" data-te-toggle="tooltip"
                                data-te-placement="bottom"
                                class="inline-block rounded-full  bg-primary dark:bg-transparent  p-2 uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                                <i
                                    class="fa-solid fa-burger @if ($daycarePet->lunch_time) text-green-500 @endif"></i>
                            </button>
                            @if (!$daycarePet->exit_time)
                                <button type="button" data-te-ripple-init data-te-ripple-color="light"
                                    title="Check-Out" wire:click='checkOut({{ $daycarePet->id }})'
                                    data-te-toggle="tooltip" data-te-placement="right"
                                    class="inline-block rounded-full bg-primary dark:bg-transparent  p-2 uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                                    <i class="fa-solid fa-arrow-right-from-bracket "></i>
                                </button>
                            @endif



                        </div>
                    </div>
                @endforeach

            </div>
        </section>
        <!-- Section: Design Block -->
    </div>
    <!-- Container for demo purpose -->

    <div wire:ignore.defer data-te-modal-init
        class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
        id="note-daycare" tabindex="-1" aria-labelledby="note-daycareLabel" aria-modal="true" role="dialog">
        <div data-te-modal-dialog-ref
            class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px] min-[992px]:max-w-[800px]">
            <div
                class="relative flex flex-col w-full text-current bg-white border-none rounded-md shadow-lg outline-none pointer-events-auto bg-clip-padding dark:bg-neutral-600">
                <div
                    class="flex items-center justify-between flex-shrink-0 p-4 border-b-2 border-opacity-100 rounded-t-md border-neutral-100 dark:border-opacity-50">
                    <!--Modal title-->
                    <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                        id="note-daycareLabel">
                        Observações
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

                <!--Modal body-->
                <div class="relative flex-auto p-4" data-te-modal-body-ref>
                    <div class="relative flex-auto p-4" data-te-modal-body-ref>

                        <div class="mb-4">

                            <textarea class="input" id="booking-notes" wire:model.live='note' rows="10"></textarea>

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

                    <x-primary-button class="ml-3" type='button' data-te-modal-dismiss data-te-ripple-init
                        wire:click='saveNote' data-te-ripple-color="light">
                        {{ __('Salvar') }}
                    </x-primary-button>
                </div>

            </div>
        </div>
    </div>
</div>
