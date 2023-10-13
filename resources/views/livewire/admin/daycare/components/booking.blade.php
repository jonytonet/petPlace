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
                                {{ \Carbon\Carbon::createFromFormat('H:i:s', $daycarePet->entry_time)->addHours($daycarePet->daycareEnrollment->daycarePlan->session_type)->format('H:i:s') }}
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
                            <button type="button" data-te-ripple-init data-te-ripple-color="light" title="Observações"
                                data-te-toggle="tooltip" data-te-placement="left"
                                class="inline-block rounded-full  bg-primary dark:bg-transparent  p-2 uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                                <i class="fa-solid fa-clipboard-list "></i>
                            </button>
                            <button type="button" data-te-ripple-init data-te-ripple-color="light"
                                wire:click='checkLunchTime({{ $daycarePet->id }})' title="Marcar Almoço"
                                @if ($daycarePet->lunch_time) disabled @endif data-te-toggle="tooltip"
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
</div>
