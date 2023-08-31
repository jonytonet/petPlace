<div>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="flex justify-end">
                        @if ($showTable)
                            <x-primary-button x-data="" wire:click="toggleShowTable">
                                {{ __('Novo Cliente') }}
                            </x-primary-button>
                        @else
                            <x-secondary-button x-data="" wire:click="toggleShowTable">
                                {{ __('Voltar') }}
                            </x-secondary-button>
                        @endif

                    </div>


                    @if ($showTable)
                        @livewire('admin.customers.components.table')
                    @else
                        @livewire('admin.customers.components.create-customer')
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
