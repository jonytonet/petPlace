<div>
    <div class="mb-4">
        <label for="check-type" class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Tipo</label>
        <select id="check-type" class="input text-neutral-700" wire:model.live='checkInType'>
            <option value="">Selecione</option>
            <option value="M">Auluno Matriculado</option>
            <option value="A">Diária Avulsa</option>

        </select>
    </div>
    @if ($checkInType == 'A')
        <div class="mb-4" id="single-daily">
            <label for="pet" class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Pet</label>
            <select id="pet" class="input text-neutral-700" wire:model='petId'>
                <option value="">Selecione</option>
                @foreach ($pets as $pet)
                    <option value="{{ $pet->id }}">{{ $pet->name }} - {{ $pet->user->name }} </option>
                @endforeach
            </select>

        </div>
        <div class="mb-4" id="period" >
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
            <label for="discount"
                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Valor</label>
            <input type="text" class="input" id="value"
                wire:model.live='value'
                onkeyup="validePriceInput(event)" />

        </div>
    @elseif ($checkInType == 'M')
        <div class="mb-4" id="enrollment-div">
            <label for="enrollment" class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Pet</label>
            <select id="enrollment" class="input text-neutral-700" wire:model='enrollmentId'>
                <option value="">Selecione</option>
                @foreach ($enrollments as $enrollment)
                    <option value="{{ $enrollment->id }}">{{ $enrollment->pet->name }} -
                        {{ $enrollment->pet->user->name }} </option>
                @endforeach
            </select>

        </div>
    @endif
    <div
        class="flex flex-wrap items-center justify-end flex-shrink-0 p-4 border-t-2 border-opacity-100 rounded-b-md border-neutral-100 dark:border-opacity-50">
        <x-secondary-button type='reset' data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
            {{ __('Cancelar') }}
        </x-secondary-button>
        <x-primary-button class="ml-3" type='button' data-te-modal-dismiss data-te-ripple-init
            data-te-ripple-color="light" wire:click='addCheckIn'>
            {{ __('CheckIn') }}
        </x-primary-button>
    </div>

</div>
