<div class="flex flex-col overflow-x-auto">
    <div class="sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-x-auto">
                <table class="min-w-full font-light text-left">
                    <thead class="text-sm font-medium border-b dark:border-neutral-500">
                        <tr>
                            <th scope="col" class="px-6 py-4">#</th>
                            <th scope="col" class="px-6 py-4">Nome</th>
                            <th scope="col" class="px-6 py-4">Cpf</th>
                            <th scope="col" class="px-6 py-4">Celular</th>
                            <th scope="col" class="px-6 py-4">Telefone</th>
                            <th scope="col" class="px-6 py-4">Cont.Alternativo</th>
                            <th scope="col" class="px-6 py-4">Celular Cont.Alternativo</th>
                            <th scope="col" class="px-6 py-4">Pets</th>
                            <th scope="col" class="px-6 py-4">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="text-xs">
                        @foreach ($customers as $customer)
                            <tr
                                class="transition duration-300 ease-in-out border-b hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                <td class="px-6 py-4 font-medium whitespace-nowrap">1</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $customer->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $customer->cpf }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $customer->cellphone_number }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $customer->phone_number }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ Illuminate\Support\Str::limit($customer->alternate_contact_name, 15, '...') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $customer->alternate_contact_cellphone_number }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">#</td>
                                <td class="px-6 py-4 whitespace-nowrap"> <x-danger-button wire:click="">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </x-danger-button></td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
