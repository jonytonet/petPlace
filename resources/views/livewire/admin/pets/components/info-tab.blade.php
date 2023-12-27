<div>
    <div class="flex flex-col">

        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">

                <div class="overflow-hidden">
                    <table class="min-w-full text-sm font-light text-center">

                        <tbody>
                            <tr class="border-b dark:border-neutral-500">
                                @if ($pet->image && !$petEdit)
                                    <td class="px-6 py-4 whitespace-nowrap" colspan='100%'>
                                        <img src="{{ asset('storage/' . $pet->image) }}"
                                            class="mx-auto mb-4 border-4 rounded-full shadow-lg dark:shadow-black/20"
                                            alt="" style="max-width: 200px" />
                                    </td>
                                @else
                                    <td class="px-6 py-4 whitespace-nowrap">Defina imagem</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <input type="file" id="pet-image" wire:model.live='photo' class="input"
                                            @if (!$petEdit) disabled @endif class="file" />
                                    </td>
                                    @if ($photo)
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <img src="{{ $photo->temporaryUrl() }}"
                                                class="mx-auto mb-4 border-4 rounded-full shadow-lg dark:shadow-black/20"
                                                alt="" style="max-width: 100px" />
                                        </td>
                                    @else
                                        <td></td>
                                    @endif
                                    <td></td>
                                @endif
                            </tr>
                            <tr class="border-b dark:border-neutral-500">

                                <td class="px-6 py-4 whitespace-nowrap" width='20%'>Nome</td>

                                <td class="px-6 py-4 whitespace-nowrap" width='30%'>
                                    <input type="text" id="pet-name" wire:model='petInfo.name'
                                        @if (!$petEdit) disabled @endif value="{{ $pet->name }}"
                                        class="input" />
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap" width='20%'>Especie</td>

                                <td class="px-6 py-4 whitespace-nowrap" width='30%'>
                                    <select id="pet-especie" class="input text-neutral-700"
                                        @if (!$petEdit) disabled @endif
                                        wire:model.live='petInfo.specie_id'>
                                        <option value="">Selecione</option>
                                        @foreach ($species as $specie)
                                            <option value="{{ $specie->id }}"
                                                @if ($specie->id == $pet->specie_id) selected @endif>{{ $specie->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr class="border-b dark:border-neutral-500">

                                <td class="px-6 py-4 whitespace-nowrap" width='20%'>Gênero</td>

                                <td class="px-6 py-4 whitespace-nowrap" width='30%'>
                                    <select id="pet-gender" class="input text-neutral-700" wire:model='petInfo.gender'
                                        @if (!$petEdit) disabled @endif>
                                        <option value="">Selecione</option>
                                        <option value="female" @if ($pet->gender == 'female') selected @endif>Fêmea
                                        </option>
                                        <option value="male" @if ($pet->gender == 'male') selected @endif>Macho
                                        </option>
                                    </select>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap" width='20%'>Raça</td>

                                <td class="px-6 py-4 whitespace-nowrap" width='30%'>
                                    <select id="pet-breed" class="input text-neutral-700" wire:model='petInfo.breed_id'
                                        @if (!$petEdit) disabled @endif>
                                        <option value="">Selecione</option>
                                        @foreach ($breeds as $breed)
                                            <option value="{{ $breed->id }}"
                                                @if ($breed->id == $pet->breed_id) selected @endif>{{ $breed->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr class="border-b dark:border-neutral-500">

                                <td class="px-6 py-4 whitespace-nowrap" width='20%'>Nascimento</td>

                                <td class="px-6 py-4 whitespace-nowrap" width='30%'>
                                    <input type="date" id="pet-date_of_birth" wire:model='petInfo.date_of_birth'
                                        @if (!$petEdit) disabled @endif
                                        value="{{ $pet->date_of_birth }}" class="input" />
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap" width='20%'>Pelagem</td>

                                <td class="px-6 py-4 whitespace-nowrap" width='30%'>
                                    <select id="pet-fur" class="input text-neutral-700"
                                        @if (!$petEdit) disabled @endif
                                        wire:model.live='petInfo.fur'>
                                        <option value="">Selecione</option>
                                        <option value="short" @if ($pet->fur == 'short') selected @endif>Curto
                                        </option>
                                        <option value="average" @if ($pet->fur == 'average') selected @endif>
                                            Médio</option>
                                        <option value="long " @if ($pet->fur == 'long') selected @endif>Longo
                                        </option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="border-b dark:border-neutral-500">

                                <td class="px-6 py-4 whitespace-nowrap" width='20%'>Tamanho </td>

                                <td class="px-6 py-4 whitespace-nowrap" width='30%'>
                                    <select id="pet-size" class="input text-neutral-700" wire:model='petInfo.size'
                                        @if (!$petEdit) disabled @endif>
                                        <option value="">Selecione</option>
                                        <option value="mini" @if ($pet->size == 'mini') selected @endif>Mini
                                        </option>
                                        <option value="small" @if ($pet->size == 'small') selected @endif>
                                            Pequeno</option>
                                        <option value="average" @if ($pet->size == 'average') selected @endif>
                                            Médio</option>
                                        <option value="big" @if ($pet->size == 'big') selected @endif>
                                            Grande</option>
                                        <option value="giant" @if ($pet->size == 'giant') selected @endif>
                                            Gigante</option>
                                    </select>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap" width='20%'>Raça</td>

                                <td class="px-6 py-4 whitespace-nowrap" width='30%'>
                                    <select id="pet-microchip" class="input text-neutral-700"
                                        wire:model='petInfo.microchip'
                                        @if (!$petEdit) disabled @endif>
                                        <option value="">Selecione</option>
                                        <option value="yes" @if ($pet->microchip == 'yes') selected @endif>Sim
                                        </option>
                                        <option value="no" @if ($pet->microchip == 'no') selected @endif>Não
                                        </option>
                                    </select>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="flex justify-end space-x-4">
            <x-secondary-button wire:click='toggleEdit()'>
                @if ($petEdit)
                    Voltar
                @else
                    Editar
                @endif
            </x-secondary-button>
            @if ($petEdit)
                <x-primary-button wire:click='save'>Salvar <div wire:loading='save'
                        class="inline-block h-3 w-3 animate-spin rounded-full border-2 border-solid border-current border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite]"
                        role="status">
                        <span
                            class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
                    </div></x-primary-button>
            @endif
        </div>

    </div>
</div>
