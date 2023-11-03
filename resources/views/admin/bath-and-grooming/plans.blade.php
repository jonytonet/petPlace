<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between ">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('Pacotes de Banho') }}
            </h2>
            <div class="ml-auto">
                @include('layouts.dropdown_menu')
            </div>
        </div>

        @livewire('admin.bath-and-grooming.plan.index')
    </x-slot>

</x-app-layout>
