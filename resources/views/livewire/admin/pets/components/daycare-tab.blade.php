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
                                @if ($enrollmentActive)
                                    {{ $enrollmentActive->daycareDailyCreditLast->daily_credit }}
                                @else
                                    0
                                @endif

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
                                {{ count($bookings) }}
                            </h3>
                            {{-- <h5 class="mb-4 text-lg font-medium">Growth</h5> --}}
                            <p class="text-neutral-500 dark:text-neutral-300">
                                Total dias.
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
                                @if ($enrollmentActive)
                                    R${{ number_format($baths->sum('service_value'), 2, ',', '.') }}
                                @else
                                    R$ 0,00
                                @endif

                            </h3>
                            {{-- <h5 class="mb-4 text-lg font-medium">Projects</h5> --}}
                            <p class="text-neutral-500 dark:text-neutral-300">
                                Total valor.
                            </p>
                        </div>
                    </div>
                </div>
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
                                @if ($enrollmentActive)
                                    {{ \Carbon\Carbon::parse($enrollmentActive->daycareDailyCreditLast->created_at)->format('d/m/Y') }}
                                @else
                                    Nada Consta
                                @endif


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
    </div>
    <!-- Container for demo purpose -->
</div>
