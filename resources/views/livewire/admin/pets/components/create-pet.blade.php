<div>
    <section class="space-y-6">

        <div class="w-full">
            <div class="p-6">
                <div class="mb-4">
                    <h6>Dados do Pet</h6>
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
                                <option value="female">Feminino</option>
                                <option value="male">Masculino</option>
                                <option value="undefined">Não Declarado</option>
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

                <div class="flex justify-end mt-6">
                    <x-secondary-button wire:click="$dispatch('return-to-table')">
                        {{ __('Cancelar') }}
                    </x-secondary-button>

                    <x-primary-button class="ml-3" type='button' wire:click='save(0)'>
                        {{ __('Salvar') }}
                    </x-primary-button>
                    <x-primary-button type='button' class="ml-3" wire:click='save(1)'>
                        {{ __('Salvar e Cadastrar Novo') }}
                    </x-primary-button>
                </div>
            </div>
        </div>

    </section>


</div>
