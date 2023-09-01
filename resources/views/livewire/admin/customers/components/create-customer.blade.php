<div>
    <section class="space-y-6">



        <div class="w-full">
            <form class="p-6">
                <div class="mb-4">
                    <h6>Dados do Cliente</h6>
                    <hr>
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <div class="mb-4">
                            <label for="nome"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Nome</label>
                            <input type="text" id='nome' class="input" />
                        </div>
                        <div class="mb-4">
                            <label for="cell_phone"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Celular</label>
                            <input type="text" class="input" id="cell_phone" x-mask="(99)99999-9999" />
                        </div>
                        <div class="mb-4">
                            <label for="cpf"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Cpf</label>
                            <input type="text" class="input" id="cpf" x-mask="999.999.999-99" />
                        </div>
                        <div class="mb-4">
                            <label for="opcao"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Gênero</label>
                            <select id="opcao" class="input text-neutral-700">
                                <option value="">Selecione</option>
                                <option value="F">Feminino</option>
                                <option value="M">Masculino</option>
                                <option value="I">Não Declarado</option>
                            </select>
                        </div>

                    </div>
                    <div>
                        <div class="mb-4">
                            <label for="email"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Email</label>
                            <input type="email" id="email" class="input" />
                        </div>
                        <div class="mb-4">
                            <label for="telefone"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Telefone</label>
                            <input type="text" id="telefone" x-mask="(99)9999-9999" class="input" />
                        </div>
                        <div class="mb-4">
                            <label for="rg"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">RG</label>
                            <input type="text" id="rg" x-mask="99.999.999-9" class="input" />
                        </div>
                        <div class="mb-4">
                            <label for="opcao_type"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Tipo
                                Usuário</label>
                            <select id="opcao_type" class="input text-neutral-700">
                                <option value="">Selecione</option>
                                <option value="ADMIM">Admin</option>

                            </select>
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
                            <input type="text" id="nome_alter" class="input" />
                        </div>
                    </div>

                    <div>
                        <div class="mb-4">
                            <label for="cell_phone_number_alter"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Celular</label>
                            <input type="text" id="cell_phone_number_alter" class="input" x-mask="(99)99999-9999" />
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
                                wire:blur='getZipCode' wire:model.live='zipCode' />
                        </div>
                    </div>
                    <div class="col-span-2">
                        <div class="mb-4">
                            <label for="rua"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Rua</label>
                            <input type="text" id="rua" class="input" wire:model.live='address'
                                value="{{ $address }}" />
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    <div class="col-span-1 ">
                        <div class="grid grid-cols-2 gap-2">
                            <div class="mb-4 mr-4">
                                <label for="numero"
                                    class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Número</label>
                                <input type="text" id="numero" class="input" />
                            </div>
                            <div class="mb-4">
                                <label for="complemento"
                                    class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Complemento</label>
                                <input type="text" id="complemento" class=" input" />
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="mb-4">
                            <label for="bairro"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Bairro</label>
                            <input type="text" id="bairro" class="input" wire:model.live='district'
                                value="{{ $district }}" />
                        </div>.live
                    </div>
                    <div class="col-span-1">
                        <div class="mb-4">
                            <label for="cidade"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Cidade</label>
                            <input type="text" id="cidade" class="input" wire:model='city'
                                value="{{ $city }}" />
                        </div>
                    </div>
                </div>
                <div class="flex justify-end mt-6">
                    <x-secondary-button x-on:click="$dispatch('')">
                        {{ __('Cancelar') }}
                    </x-secondary-button>

                    <x-primary-button class="ml-3">
                        {{ __('Salvar') }}
                    </x-primary-button>
                    <x-primary-button class="ml-3">
                        {{ __('Salvar e Cadastrar Pet') }}
                    </x-primary-button>
                </div>
            </form>
        </div>

    </section>


</div>
