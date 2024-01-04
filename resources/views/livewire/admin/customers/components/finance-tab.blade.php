<div>
    <div class="flex justify-between mt-3">
        <input type="text" class=" input" style="max-width: 200px" placeholder="Referencia" wire:model.live='reference' />
    </div>
    <div class="sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-x-auto sm:max-w-[473.6px] md:max-w-full">
                <div class="overflow-y-auto max-h-500">
                    <table class="min-w-full font-light text-left">
                        <thead class="text-sm font-medium border-b dark:border-neutral-500">
                            <tr>

                                <th scope="col" class="px-6 py-4 text-center">
                                    Referencia
                                </th>
                                <th scope="col" class="px-6 py-4 text-center"
                                    wire:click="toggleOrderBy('service_type_id')">
                                    <span role="button">Serviço</span>
                                </th>
                                <th scope="col" class="px-6 py-4 text-center"
                                    wire:click="toggleOrderBy('service_value')">
                                    <span role="button">Valor</span>
                                </th>
                                <th scope="col" class="px-6 py-4 text-center" wire:click="toggleOrderBy('discount')">
                                    <span role="button">Desconto</span>
                                </th>
                                <th scope="col" class="px-6 py-4 text-center"
                                    wire:click="toggleOrderBy('additional_expenses')">
                                    <span role="button"> Adicional</span>
                                </th>
                                <th scope="col" class="px-6 py-4 text-center"
                                    wire:click="toggleOrderBy('net_total')">
                                    <span role="button"> Total</span>
                                </th>
                                <th scope="col" class="px-6 py-4 text-center" wire:click="toggleOrderBy('is_paid')">
                                    <span role="button"> Status</span>
                                </th>
                                <th scope="col" class="px-6 py-4 text-center"
                                    wire:click="toggleOrderBy('created_at')"><span role="button">Data</span>
                                </th>

                            </tr>
                        </thead>
                        <tbody class="text-xs">
                            @foreach ($finances as $item)
                                <tr
                                    class="transition duration-300 ease-in-out border-b hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">


                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        {{ $item->serviceReference->reference }}
                                    </td>

                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        {{ $item->serviceType->name }}

                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        {{ number_format($item->service_value, '2', ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        {{ number_format($item->discount, '2', ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        {{ number_format($item->additional_expenses, '2', ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        {{ number_format($item->net_total, '2', ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        @if ($item->is_paid)
                                            <span
                                                class="inline-block whitespace-nowrap rounded-[0.27rem] bg-success-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-success-700">
                                                PAGO
                                            </span>
                                        @else
                                            <span
                                                class="inline-block whitespace-nowrap rounded-[0.27rem] bg-danger-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-danger-700">
                                                PENDENTE
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
</div>
