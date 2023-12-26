<div>
    <div wire:ignore.self data-te-modal-init
        class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
        id="showBathBooking" tabindex="-1" aria-labelledby="showBathBookingLabel" aria-modal="true" role="dialog">
        <div data-te-modal-dialog-ref wire:ignore.self
            class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px] min-[992px]:max-w-[800px]">
            <div
                class="relative flex flex-col w-full text-current bg-white border-none rounded-md shadow-lg outline-none pointer-events-auto bg-clip-padding dark:bg-neutral-600">
                <div
                    class="flex items-center justify-between flex-shrink-0 p-4 border-b-2 border-opacity-100 rounded-t-md border-neutral-100 dark:border-opacity-50">
                    <!--Modal title-->
                    <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                        id="showBathBookingLabel">
                        Detalhes do Banho
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
                <div class="relative flex-auto p-4" data-te-modal-body-ref wire:poll.5s>
                    <div class="relative flex-auto p-4" data-te-modal-body-ref>

                        <section class="p-6 text-center rounded-md shadow-lg md:p-12 md:text-left"
                            style="background:#81D8D0">
                            <div class="flex justify-center">
                                <div class="w-full">
                                    <div
                                        class="block p-3 m-2 bg-white rounded-lg shadow-lg dark:bg-neutral-800 dark:shadow-black/20">

                                        <div class="md:flex md:flex-row">
                                            <div
                                                class="flex items-center justify-center mx-auto mb-6 w-28 md:mx-0 md:w-96 lg:mb-0">
                                                @if ($urlImage)
                                                    <img src="{{ asset('storage/' . $urlImage) }}"
                                                        class="mx-auto mb-4 border-4 rounded-full shadow-lg dark:shadow-black/20"
                                                        alt="" style="max-width: 200px" />
                                                @else
                                                    <img src="{{ asset('assets/images/canva.png') }}"
                                                        class="mx-auto mb-4 border-4 rounded-full shadow-lg dark:shadow-black/20"
                                                        alt="" style="max-width: 100px" />
                                                @endif
                                            </div>
                                            <div class="md:ml-6">

                                                <p
                                                    class="mb-2 text-xl font-semibold text-neutral-800 dark:text-neutral-200">
                                                    {{ $petName }}
                                                </p>
                                                <p class="mb-0 font-semibold text-neutral-500 dark:text-neutral-400">
                                                    {{ $tutor }}
                                                </p><br />
                                                <p class="mb-0 font-semibold text-neutral-500 dark:text-neutral-400">
                                                    {{ $date }} - {{ $time }}
                                                </p><br />
                                                <div class="flex flex-col">
                                                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                                            <div class="overflow-hidden">
                                                                <table class="min-w-full text-sm font-light text-left">
                                                                    <tbody>
                                                                        @foreach ($bathTypes as $bathType)
                                                                            <tr
                                                                                class="transition duration-300 ease-in-out border-b hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                                                                <td
                                                                                    class="px-6 py-4 font-medium whitespace-nowrap">
                                                                                    <i
                                                                                        class="text-green-500 fa-solid fa-check"></i>
                                                                                </td>
                                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                                    {{ $bathType }}
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                        @foreach ($bathComplements as $bathComplement)
                                                                            <tr
                                                                                class="transition duration-300 ease-in-out border-b hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                                                                <td
                                                                                    class="px-6 py-4 font-medium whitespace-nowrap">
                                                                                    <i
                                                                                        class="text-green-500 fa-solid fa-check"></i>
                                                                                </td>
                                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                                    {{ $bathComplement }}
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br />
                                                <p class="mb-0 font-semibold text-neutral-500 dark:text-neutral-400">
                                                    {{ $extraServices }}
                                                </p><br />
                                                <p class="mb-0 font-semibold text-neutral-500 dark:text-neutral-400">
                                                    {{ $notes }}
                                                </p><br />

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <!--Modal footer-->
                <div
                    class="flex flex-wrap items-center justify-end flex-shrink-0 p-4 border-t-2 border-opacity-100 rounded-b-md border-neutral-100 dark:border-opacity-50">
                    <x-secondary-button data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                        {{ __('Fechar') }}
                    </x-secondary-button>


                </div>


            </div>
        </div>

    </div>
</div>
