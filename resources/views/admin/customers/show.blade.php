@php
    $customer = app()
        ->make(\App\Services\UserService::class)
        ->find($id);
@endphp
<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between ">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ $customer->name }}
            </h2>
            <div class="ml-auto">
                @include('layouts.dropdown_menu')
            </div>
        </div>
    </x-slot>

    @livewire('admin.customers.show', ['customer' => $customer])

</x-app-layout>
