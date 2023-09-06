<div>
    <section class="space-y-6">

        <div class="w-full">
            <div class="p-6">
                <div class="mb-4">
                    <div class="flex justify-between">
                        <h6><span>Dados do Pet</span></h6>
                        @if ($photo)
                            <img src="{{ $photo->temporaryUrl() }}" class="w-32 mb-2 rounded-lg shadow-lg " alt="Avatar"
                                style="max-width:80px; max-Height:80px">
                        @endif

                    </div>
                    <hr>
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <div class="mb-4">
                            <label for="tutor"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Tutor</label>

                            <select class="input" data-te-select-init data-te-select-filter="true">
                                <option value="">Selecione</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach

                            </select>


                            @error('form.name')
                                <div class="text-sm font-bold text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="name"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Nome do
                                Pet</label>
                            <input type="text" class="input" id="name" wire:model='' />
                            @error('form.cellphone')
                                <div class="text-sm font-bold text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="raca"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Raça</label>
                            <select id="raca" class="input text-neutral-700" wire:model=''>
                                <option value="">Selecione</option>
                                <option value="">YorkShire</option>
                                <option value="">Pug</option>
                                <option value="">Outros</option>
                            </select>
                            @error('form.cpf')
                                <div class="text-sm font-bold text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="pelagem"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Pelagem</label>
                            <select id="pelagem" class="input text-neutral-700" wire:model='form.gender'>
                                <option value="">Selecione</option>
                                <option value="short">Curto</option>
                                <option value="average">Médio</option>
                                <option value="long ">Longo</option>
                            </select>
                            @error('form.gender')
                                <div class="text-sm font-bold text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="porte"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Porte</label>
                            <select id="porte" class="input text-neutral-700" wire:model='form.gender'>
                                <option value="">Selecione</option>
                                <option value="short">Mini</option>
                                <option value="average">Pequeno</option>
                                <option value="long ">Médio</option>
                                <option value="long ">Grande</option>
                                <option value="long ">Gigante</option>
                            </select>
                            @error('form.gender')
                                <div class="text-sm font-bold text-red-400">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div>
                        <div class="mb-4">
                            <label for="image"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Foto</label>
                            <input type="file" id="image" class="input" wire:model.live='photo' />
                            @error('form.email')
                                <div class="text-sm font-bold text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="especie"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Especie</label>
                            <select id="especie" class="input text-neutral-700" wire:model='form.gender'>
                                <option value="">Selecione</option>
                                <option value="canine">Canina</option>
                                <option value="feline">Felina</option>
                                <option value="others">Outros</option>
                            </select>

                            @error('form.phone')
                                <div class="text-sm font-bold text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="genero"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Gênero</label>
                            <select id="genero" class="input text-neutral-700" wire:model='form.gender'>
                                <option value="">Selecione</option>
                                <option value="female">Feminino</option>
                                <option value="male">Masculino</option>
                            </select>
                            @error('form.gender')
                                <div class="text-sm font-bold text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="aniversario"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Aniversário</label>
                            <input type="date" id="aniversario" class="input" wire:model='' />
                            @error('form.gender')
                                <div class="text-sm font-bold text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="especie"
                                class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Microchip</label>
                            <select id="especie" class="input text-neutral-700" wire:model='form.gender'>
                                <option value="">Selecione</option>
                                <option value="yes">Sim</option>
                                <option value="no">Não</option>
                            </select>

                            @error('form.phone')
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
