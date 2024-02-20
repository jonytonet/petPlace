<div>
    <div class="flex flex-col">

        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">

                <div class="overflow-hidden">
                    <table class="min-w-full text-sm font-light text-center">

                        <tbody>
                            <tr class="border-b dark:border-neutral-500">
                                <td class="px-6 py-4 whitespace-nowrap" colspan="100%">
                                    <h6>Cliente</h6>
                                </td>
                            </tr>
                            <tr class="border-b dark:border-neutral-500">

                                <td class="px-6 py-4 whitespace-nowrap" width='20%'>Nome</td>

                                <td class="px-6 py-4 whitespace-nowrap" width='30%'>
                                    <input type="text" id="customer-name" wire:model='customerInfo.name'
                                        @if (!$customerEdit) disabled @endif value="{{ $customer->name }}"
                                        class="input" />
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap" width='20%'>Email</td>

                                <td class="px-6 py-4 whitespace-nowrap" width='30%'>
                                    <input type="email" id="customer-email" wire:model='customerInfo.email'
                                        @if (!$customerEdit) disabled @endif value="{{ $customer->email }}"
                                        class="input" />
                                </td>

                            </tr>

                            <tr class="border-b dark:border-neutral-500">

                                <td class="px-6 py-4 whitespace-nowrap" width='20%'>CPF </td>

                                <td class="px-6 py-4 whitespace-nowrap" width='30%'>
                                    <input type="text" class="input" id="customer-cpf"
                                        @if (!$customerEdit) disabled @endif x-mask="999.999.999-99"
                                        wire:model='customerInfo.cpf' value="{{ $customer->cpf }}" />
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap" width='20%'>RG</td>

                                <td class="px-6 py-4 whitespace-nowrap" width='30%'>
                                    <input type="text" id="customer-rg" wire:model='customerInfo.rg'
                                        @if (!$customerEdit) disabled @endif value="{{ $customer->rg }}"
                                        class="input" />
                                </td>

                            </tr>
                            <tr class="border-b dark:border-neutral-500">

                                <td class="px-6 py-4 whitespace-nowrap" width='20%'>Telefone</td>

                                <td class="px-6 py-4 whitespace-nowrap" width='30%'>
                                    <input type="text" id="customer-phone_number"
                                        wire:model='customerInfo.phone_number' x-mask="(99)9999-9999"
                                        @if (!$customerEdit) disabled @endif
                                        value="{{ $customer->phone_number }}" class="input" />
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap" width='20%'>Celular</td>

                                <td class="px-6 py-4 whitespace-nowrap" width='30%'>
                                    <input type="text" class="input" id="customer-cellphone_number"
                                        @if (!$customerEdit) disabled @endif x-mask="(99)99999-9999"
                                        wire:model='customerInfo.cellphone_number'
                                        value="{{ $customer->cellphone_number }}" />
                                </td>
                            </tr>
                            <tr class="border-b dark:border-neutral-500">

                                <td class="px-6 py-4 whitespace-nowrap" width='20%'>Gênero</td>

                                <td class="px-6 py-4 whitespace-nowrap" width='30%'>
                                    <select id="customer-gender" class="input text-neutral-700"
                                        wire:model='customerInfo.gender'
                                        @if (!$customerEdit) disabled @endif>
                                        <option value="">Selecione</option>
                                        <option value="male" @if ($customer->gender == 'male') selected @endif>
                                            Masculino
                                        </option>
                                        <option value="female" @if ($customer->gender == 'female') selected @endif>
                                            Feminino
                                        </option>
                                        <option value="undefined" @if ($customer->gender == 'undefined') selected @endif>Não
                                            Declarado</option>
                                    </select>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap" width='20%'></td>

                                <td class="px-6 py-4 whitespace-nowrap" width='30%'>

                                </td>
                            </tr>
                            <tr class="border-b dark:border-neutral-500">
                                <td class="px-6 py-4 whitespace-nowrap" colspan="100%">
                                    <h6>Contato Alternativo</h6>
                                </td>
                            </tr>
                            <tr class="border-b dark:border-neutral-500">

                                <td class="px-6 py-4 whitespace-nowrap" width='20%'>Nome</td>

                                <td class="px-6 py-4 whitespace-nowrap" width='30%'>
                                    <input type="text" id="customer-alternate_contact_name"
                                        wire:model='customerInfo.alternate_contact_name'
                                        @if (!$customerEdit) disabled @endif
                                        value="{{ $customer->alternate_contact_name }}" class="input" />
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap" width='20%'>Celular</td>

                                <td class="px-6 py-4 whitespace-nowrap" width='30%'>
                                    <input type="text" class="input"
                                        id="customer-alternate_contact_cellphone_number"
                                        @if (!$customerEdit) disabled @endif
                                        wire:model='customerInfo.alternate_contact_cellphone_number'
                                        value="{{ $customer->alternate_contact_cellphone_number }}" />
                                </td>


                            </tr>
                            <tr class="border-b dark:border-neutral-500">
                                <td class="px-6 py-4 whitespace-nowrap" colspan="100%">
                                    <h6>Endereço</h6>
                                </td>
                            </tr>
                            <tr class="border-b dark:border-neutral-500" wire:poll.2s>

                                <td class="px-6 py-4 whitespace-nowrap" width='20%'>Cep</td>

                                <td class="px-6 py-4 whitespace-nowrap" width='30%'>
                                    <input type="text" class="input" id="customer-address-cep"
                                        @if (!$customerEdit) disabled @endif x-mask="99.999-999"
                                        wire:model='addressInfo.zip_code' value="{{ $customer->zip_code }}"
                                        wire:blur='getZipCode($event.target.value)' />
                                    <div wire:loading wire:target="getZipCode"
                                        class="inline-block h-3 w-3 animate-spin rounded-full border-2 border-solid border-current border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite]"
                                        role="status">
                                        <span
                                            class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap" width='20%'>Rua</td>

                                <td class="px-6 py-4 whitespace-nowrap" width='30%'>
                                    <input type="text" id="customer-address-rua" wire:model='addressInfo.address'
                                        @if (!$customerEdit) disabled @endif
                                        value="{{ $customer->address }}" class="input" />
                                </td>


                            </tr>



                            <tr class="border-b dark:border-neutral-500" wire:poll.2s>
                                <td class="px-6 py-4 whitespace-nowrap">Número</td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <input type="text" class="input" id="customer-address-number"
                                        @if (!$customerEdit) disabled @endif
                                        wire:model='addressInfo.number' value="{{ $customer->number }}" />
                                </td>
                            </tr>
                            <tr class="border-b dark:border-neutral-500" wire:poll.2s>

                                <td class="px-6 py-4 whitespace-nowrap" width='20%'>Complemento</td>

                                <td class="px-6 py-4 whitespace-nowrap" width='30%'>
                                    <input type="text" class="input" id="customer-address-complement"
                                        @if (!$customerEdit) disabled @endif
                                        wire:model='addressInfo.complement' value="{{ $customer->complement }}" />
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap" width='20%'>Bairro</td>

                                <td class="px-6 py-4 whitespace-nowrap" width='30%'>
                                    <input type="text" id="customer-address-district"
                                        wire:model='addressInfo.district'
                                        @if (!$customerEdit) disabled @endif
                                        value="{{ $customer->district }}" class="input" />
                                </td>


                            </tr>
                            <tr class="border-b dark:border-neutral-500" wire:poll.2s>

                                <td class="px-6 py-4 whitespace-nowrap" width='20%'>Cidade</td>

                                <td class="px-6 py-4 whitespace-nowrap" width='30%'>
                                    <input type="text" class="input" id="customer-address-city"
                                        @if (!$customerEdit) disabled @endif
                                        wire:model='addressInfo.city' value="{{ $customer->city }}" />
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap" width='20%'>Estado</td>

                                <td class="px-6 py-4 whitespace-nowrap" width='30%'>
                                    <input type="text" id="customer-address-state" wire:model='addressInfo.state'
                                        @if (!$customerEdit) disabled @endif
                                        value="{{ $customer->state }}" class="input" />
                                </td>


                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="flex justify-end space-x-4">
            <x-secondary-button wire:click='toggleEdit()'>
                @if ($customerEdit)
                    Voltar
                @else
                    Editar
                @endif
            </x-secondary-button>
            @if ($customerEdit)
                <x-primary-button wire:click='save'>Salvar <div wire:loading wire:target="save"
                        class="inline-block h-3 w-3 animate-spin rounded-full border-2 border-solid border-current border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite]"
                        role="status">
                        <span
                            class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
                    </div></x-primary-button>
            @endif
        </div>

    </div>
</div>
