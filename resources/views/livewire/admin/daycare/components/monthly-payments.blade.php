<div>
    <div>
        <div class="mb-4">
            <label for="month" class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Mês
                Referência</label>
            <input type="month" id='month' class="input" wire:model='referenceMonth' wire:change='getNetTotal()' />
            @error('referenceMonth')
                <div class="text-sm font-bold text-red-400">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="serviceType"
                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Serviço</label>
            <select id="serviceType" class="input text-neutral-700" wire:model='serviceTypeId'>
                <option value="">Selecione</option>
                @foreach ($serviceTypes as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            @error('serviceTypeId')
                <div class="text-sm font-bold text-red-400">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="service_value"
                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Valor</label>
            <input type="text" class="input" id="service_value" disabled
                wire:change='getNetTotal()' onkeyup="validePriceInput(event)" placeholder="{{ $serviceValue }}" />
            @error('serviceValue')
                <div class="text-sm font-bold text-red-400">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="discount"
                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Desconto</label>
            <input type="text" class="input" id="discount" wire:model='discount' wire:change='getNetTotal()'
                onkeyup="validePriceInput(event)" />
            @error('discount')
                <div class="text-sm font-bold text-red-400">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="payment_method_id"
                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Forma de Pagamento</label>
            <select id="payment_method_id" class="input text-neutral-700" wire:model='paymentMethodId'>
                <option value="">Selecione</option>
                @foreach ($paymentMethods as $payItem)
                    <option value="{{ $payItem->id }}">{{ $payItem->name }}</option>
                @endforeach
            </select>
            @error('paymentMethodId')
                <div class="text-sm font-bold text-red-400">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <hr>
            <div class="flex justify-between mt-4">
                <div>
                    <p> <small>Juros: R${{ number_format($fee ?? 0, 2, ',', '.') }}</small></p>
                    <p> <small>Desconto: R${{ number_format($discount ?? 0, 2, ',', '.') }}</small></p>
                </div>
                <div>
                    <div class="w-24 mb-3 text-sm font-semibold text-center text-white rounded text-wrap bg-primary">
                        <h6>Total: R${{ number_format($netTotal ?? 0, 2, ',', '.') }} </h6>
                    </div>
                    <x-primary-button class="ml-3" type='button'>
                        {{ __('Salvar') }} <div wire:loading=''
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

    <script>
        function validePriceInput(event) {
            const input = event.target;
            const value = input.value.replace(/[^0-9.,]/g, "");
            input.value = value;
        }

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


            @this.on('serviceValueInput', (event) => {
                document.getElementById('service_value').value = event[0];
            });
        });
    </script>
</div>
