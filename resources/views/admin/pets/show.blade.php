@php
    $pet = app()
        ->make(\App\Services\PetService::class)
        ->find($id);
@endphp
<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between ">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ $pet->name }} - {{ $pet->user->name }}
            </h2>
            <div class="ml-auto">
                @include('layouts.dropdown_menu')
            </div>
        </div>
    </x-slot>

    @livewire('admin.pets.show', ['pet' => $pet])

</x-app-layout>
