<div>
    <section class="space-y-6">



        <div class="w-full">
            <form class="p-6">
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <div class="mb-4">
                            <label for="nome"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Nome</label>
                            <input type="text" id="nome" class="input" />
                        </div>
                        <div class="mb-4">
                            <label for="email"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Celular</label>
                            <input type="text" id="email" class="input" />
                        </div>
                        <div class="mb-4">
                            <label for="email"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Cpf</label>
                            <input type="text" id="email" class="input" />
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
                            <label for="celular"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Email</label>
                            <input type="text" id="celular" class="input" />
                        </div>
                        <div class="mb-4">
                            <label for="telefone"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Telefone</label>
                            <input type="text" id="telefone" class="input" />
                        </div>
                        <div class="mb-4">
                            <label for="telefone"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">RG</label>
                            <input type="text" id="telefone" class="input" />
                        </div>
                        <div class="mb-4">
                            <label for="opcao"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Tipo Usuário</label>
                            <select id="opcao" class="input text-neutral-700">
                                <option value="">Selecione</option>
                                <option value="ADMIM">Admin</option>

                            </select>
                        </div>
                    </div>
                </div>
            </form>


            <div class="flex justify-end mt-6">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-primary-button class="ml-3">
                    {{ __('Salvar') }}
                </x-primary-button>
            </div>
            </form>
        </div>

    </section>

</div>
