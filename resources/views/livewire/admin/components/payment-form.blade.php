<div>
    <form wire:submit='createPayment'>
        <div class="relative flex-auto p-4">

            <div class="mb-4">
                <label for="pet" class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Tipo do
                    Serviço</label>
                <select class="input" data-te-select-init style="background-color: whi" data-te-select-filter="true"
                    wire:model='serviceTypeId'>
                    <option value="">Selecione</option>
                    @foreach ($serviceTypes as $serviceType)
                        <option value="{{ $serviceType->id }}">
                            {{ $serviceType->name }}</option>
                    @endforeach

                </select>
                @error('serviceTypeId')
                    <div class="text-sm font-bold text-red-400">
                        {{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="" class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Método de
                    Pagamento</label>
                <select class="input" data-te-select-init data-te-select-filter="true" wire:model='paymentMethodId'>
                    <option value="">Selecione</option>
                    @foreach ($paymentMethods as $paymentMethod)
                        <option value="{{ $paymentMethod->id }}">
                            {{ $paymentMethod->name }}</option>
                    @endforeach

                </select>
                @error('paymentMethodId')
                    <div class="text-sm font-bold text-red-400">
                        {{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="serviceValue" class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Valor
                </label>
                <input type="text" id="serviceValue" class="input" wire:model='serviceValue'
                    @if ($valueDisabled) disabled @endif onkeydown="validePriceInput(event)" />
                @error('serviceValue')
                    <div class="text-sm font-bold text-red-400">
                        {{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="discount" class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Desconto
                </label>
                <input type="text" id="discount" class="input" wire:model='discount'
                    onkeydown="validePriceInput(event)" />
                @error('discount')
                    <div class="text-sm font-bold text-red-400">
                        {{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="additional_expenses"
                    class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Despesa Adicional
                </label>
                <input type="text" id="additional_expenses" class="input" wire:model='additional_expenses' />
                @error('additional_expenses')
                    <div class="text-sm font-bold text-red-400">
                        {{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="" class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Método de
                    Pagamento</label>
                <select class="input" data-te-select-init data-te-select-filter="true" wire:model='commissionBy'>
                    <option value="">Selecione</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->name }}</option>
                    @endforeach

                </select>
                @error('commissionBy')
                    <div class="text-sm font-bold text-red-400">
                        {{ $message }}</div>
                @enderror
            </div>

        </div>

        <div
            class="flex flex-wrap items-center justify-end flex-shrink-0 p-4 border-t-2 border-opacity-100 rounded-b-md border-neutral-100 dark:border-opacity-50">
            <x-secondary-button type='reset'>
                {{ __('Cancelar') }}
            </x-secondary-button>

            <x-primary-button class="ml-3" type='submit'>
                {{ __('Finalizar') }} <div wire:loading='createPayment'
                    class="inline-block h-3 w-3 animate-spin rounded-full border-2 border-solid border-current border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite]"
                    role="status">
                    <span
                        class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
                </div>
            </x-primary-button>
        </div>
    </form>


    <script>
        function validePriceInput(event) {
            const input = event.target;
            const value = input.value.replace(/[^0-9.,]/g, "");
            input.value = value;
        }
    </script>
</div>
