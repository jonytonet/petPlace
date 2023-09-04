<div>
    <section class="space-y-6">

        <div class="w-full">
            <div class="p-6">
                <div class="mb-4">
                    <h6>Dados do Cliente</h6>
                    <hr>
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <div class="mb-4">
                            <label for="nome"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Nome</label>
                            <input type="text" id='nome' class="input" wire:model='form.name' />
                            @error('form.name')
                                <div class="text-sm font-bold text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="cell_phone"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Celular</label>
                            <input type="text" class="input" id="cell_phone" x-mask="(99)99999-9999"
                                wire:model='form.cellphone' />
                            @error('form.cellphone')
                                <div class="text-sm font-bold text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="cpf"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Cpf</label>
                            <input type="text" class="input" id="cpf" x-mask="999.999.999-99"
                                wire:model='form.cpf' />
                            @error('form.cpf')
                                <div class="text-sm font-bold text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="opcao"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Gênero</label>
                            <select id="opcao" class="input text-neutral-700" wire:model='form.gender'>
                                <option value="">Selecione</option>
                                <option value="F">Feminino</option>
                                <option value="M">Masculino</option>
                                <option value="I">Não Declarado</option>
                            </select>
                            @error('form.gender')
                                <div class="text-sm font-bold text-red-400">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div>
                        <div class="mb-4">
                            <label for="email"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Email</label>
                            <input type="email" id="email" class="input" wire:model='form.email' />
                            @error('form.email')
                                <div class="text-sm font-bold text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="telefone"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Telefone</label>
                            <input type="text" id="telefone" x-mask="(99)9999-9999" class="input"
                                wire:model='form.phone' />
                            @error('form.phone')
                                <div class="text-sm font-bold text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="rg"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">RG</label>
                            <input type="text" id="rg" x-mask="99.999.999-9" class="input"
                                wire:model='form.rg' />
                            @error('form.rg')
                                <div class="text-sm font-bold text-red-400">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                </div>
                <div class="mb-4">
                    <h6>Contato Alternativo</h6>
                    <hr>
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <div class="mb-4">
                            <label for="nome_alter"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Nome</label>
                            <input type="text" id="nome_alter" class="input"
                                wire:model='form.alternateContactName' />
                            @error('form.alternateContactName')
                                <div class="text-sm font-bold text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div class="mb-4">
                            <label for="cell_phone_number_alter"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Celular</label>
                            <input type="text" id="cell_phone_number_alter" class="input" x-mask="(99)99999-9999"
                                wire:model='form.alternateContactCellphone' />
                            @error('form.alternateContactCellphone')
                                <div class="text-sm font-bold text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                </div>
                <div class="mb-4">
                    <h6>Endereço</h6>
                    <hr>
                </div>
                <div class="grid grid-cols-3 gap-6">
                    <div class="col-span-1 sm:col-span-1">
                        <div class="mb-4">
                            <label for="cep"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Cep</label>
                            <input type="text" id="cep" class="input" x-mask="99.999-999"
                                wire:blur='getZipCode($event.target.value)' wire:model='form.zipCode' />
                            @error('form.zipCode')
                                <div class="text-sm font-bold text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-2">
                        <div class="mb-4">
                            <label for="rua"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Rua</label>
                            <input type="text" id="rua" class="input" wire:model='form.address' />
                            @error('form.address')
                                <div class="text-sm font-bold text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    <div class="col-span-1 ">
                        <div class="grid grid-cols-2 gap-2">
                            <div class="mb-4 mr-4">
                                <label for="numero"
                                    class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Número</label>
                                <input type="text" id="numero" class="input" x-mask="99999999"
                                    wire:model='form.addressNumber' />
                                @error('form.addressNumber')
                                    <div class="text-sm font-bold text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="complemento"
                                    class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Complemento</label>
                                <input type="text" id="complemento" class=" input"
                                    wire:model='form.addressComplement' />
                                @error('form.addressComplement')
                                    <div class="text-sm font-bold text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="mb-4">
                            <label for="bairro"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Bairro</label>
                            <input type="text" id="bairro" class="input" wire:model='form.district' />
                            @error('form.district')
                                <div class="text-sm font-bold text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="mb-4">
                            <label for="cidade"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Cidade</label>
                            <input type="text" id="cidade" class="input" wire:model='form.city' />
                            @error('form.city')
                                <div class="text-sm font-bold text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="flex justify-end mt-6">
                    <x-secondary-button wire:click="$dispatch('visibleTable')">
                        {{ __('Cancelar') }}
                    </x-secondary-button>

                    <x-primary-button class="ml-3" type='button' wire:click='save(0)'>
                        {{ __('Salvar') }}
                    </x-primary-button>
                    <x-primary-button type='button' class="ml-3" wire:click='save(1)'>
                        {{ __('Salvar e Cadastrar Pet') }}
                    </x-primary-button>
                </div>
            </div>
        </div>

    </section>


</div>
