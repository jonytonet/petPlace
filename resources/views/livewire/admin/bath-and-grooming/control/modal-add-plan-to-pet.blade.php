<div>
    <div wire:ignore.defer data-te-modal-init
        class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
        id="bath-add-plan-pet-modal" tabindex="-1" aria-labelledby="bath-add-plan-pet-modalLabel" aria-modal="true"
        role="dialog">
        <div data-te-modal-dialog-ref
            class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px] min-[992px]:max-w-[800px]">
            <div
                class="relative flex flex-col w-full text-current bg-white border-none rounded-md shadow-lg outline-none pointer-events-auto bg-clip-padding dark:bg-neutral-600">
                <div
                    class="flex items-center justify-between flex-shrink-0 p-4 border-b-2 border-opacity-100 rounded-t-md border-neutral-100 dark:border-opacity-50">
                    <!--Modal title-->
                    <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                        id="bath-add-plan-pet-modalLabel">
                        Adicione um novo pacote de banho para um Pet
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
                <form wire:submit='createPetPlan'>
                    <!--Modal body-->
                    <div class="relative flex-auto p-4" data-te-modal-body-ref>
                        <div class="relative flex-auto p-4" data-te-modal-body-ref>
                            <div class="mb-4">
                                <label for="pet"
                                    class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Pet</label>
                                <select class="input" data-te-select-init data-te-select-filter="true"
                                    wire:model='petId'  id="pet_id_plan_pet">
                                    <option value="">Selecione</option>
                                    @foreach ($pets as $pet)
                                        <option value="{{ $pet->id }}">{{ $pet->name }}</option>
                                    @endforeach

                                </select>

                            </div>
                            <div class="mb-4">
                                <label for="pet"
                                    class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Pacote</label>
                                <select class="input" data-te-select-init data-te-select-filter="true"
                                    wire:model='planId'  id="plan_id_plan_pet">
                                    <option value="">Selecione</option>
                                    @foreach ($plans as $plan)
                                        <option value="{{ $plan->id }}">{{ $plan->name }} - R${{ number_format( $plan->price, 2, ',', '.') }}</option>
                                    @endforeach

                                </select>

                            </div>
                            <div class="mb-4">
                                <label for="pet"
                                    class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Tipo de Serviço</label>
                                <select class="input" data-te-select-init data-te-select-filter="true"
                                    wire:model='serviceTypeId'  id="service_type_id">
                                    <option value="">Selecione</option>
                                    @foreach ($serviceTypes as $serviceType)
                                        <option value="{{ $serviceType->id }}">{{ $serviceType->name }} </option>
                                    @endforeach

                                </select>

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
