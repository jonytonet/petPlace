<div>
    <div class="flex flex-col ">
        <div class="flex justify-between mt-3">
            <input type="text" class=" input" style="max-width: 200px" placeholder="Pesquise"
                wire:model.live='searchTermsUser' />

            <button type="button" wire:click="addUser"
                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800'"
                data-te-toggle="modal" data-te-target="#form-create-user" data-te-ripple-init
                data-te-ripple-color="light">
                Novo
            </button>


        </div>
        <div class="sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-x-auto sm:max-w-[473.6px] md:max-w-full">
                    <div class="overflow-y-auto max-h-500">
                        <table class="min-w-full font-light text-left">
                            <thead class="text-sm font-medium border-b dark:border-neutral-500">
                                <tr>
                                    <th scope="col" class="px-6 py-4"><span role="button">#</span></th>
                                    <th scope="col" class="px-6 py-4"><span role="button">Nome</span></th>
                                    <th scope="col" class="px-6 py-4"><span role="button">Função</span></th>
                                    <th scope="col" class="px-6 py-4">Ações</th>
                                </tr>
                            </thead>
                            <tbody class="text-xs">
                                @foreach ($users as $user)
                                    <tr
                                        class="transition duration-300 ease-in-out border-b hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                        <td class="px-6 py-4 font-medium whitespace-nowrap">{{ $user->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->userType->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <x-secondary-button wire:click="editUser({{ $user->id }})"
                                                data-te-toggle="modal" data-te-target="#form-create-user"
                                                data-te-ripple-init data-te-ripple-color="light">
                                                <i class="fas fa-pencil-alt"></i>
                                            </x-secondary-button>
                                            <x-danger-button wire:click="destroyUser({{ $user->id }})"
                                                wire:confirm="Tem certeza que deseja deletar o usuário?">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </x-danger-button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mt-3">
                    {{ $users->links() }}
                </div>

            </div>
        </div>
        <div wire:ignore.defer data-te-modal-init
            class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
            id="form-create-user" tabindex="-1" aria-labelledby="form-create-userLabel" aria-modal="true"
            role="dialog">
            <div data-te-modal-dialog-ref
                class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px] min-[992px]:max-w-[500px]">
                <div
                    class="relative flex flex-col w-full text-current bg-white border-none rounded-md shadow-lg outline-none pointer-events-auto bg-clip-padding dark:bg-neutral-600">
                    <div
                        class="flex items-center justify-between flex-shrink-0 p-4 border-b-2 border-opacity-100 rounded-t-md border-neutral-100 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                            id="form-create-userLabel">
                            Usuário
                        </h5>
                        <!--Close button-->
                        <button type="button"
                            class="box-content border-none rounded-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                            data-te-modal-dismiss aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <form id="form-create-user">
                        <!--Modal body-->
                        <div class="relative flex-auto p-4" data-te-modal-body-ref>
                            <div class="mb-4">
                                <label for="user_type"
                                    class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Tipo de
                                    Usuário</label>
                                <select id="user_type" class="input text-neutral-700" wire:change='checkUserType'
                                    wire:model.live='formUser.userType'>
                                    <option value="">Selecione</option>
                                    @foreach ($userTypes as $userType)
                                        <option value="{{ $userType->id }}">{{ $userType->name }}</option>
                                    @endforeach
                                </select>
                                @error('formUser.userType')
                                    <div class="text-sm font-bold text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="name-user"
                                    class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Nome</label>
                                <input type="text" class="input" id="name-user" wire:model.live='formUser.name' />
                                @error('formUser.name')
                                    <div class="text-sm font-bold text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="email-user"
                                    class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Email</label>
                                <input type="email" class="input" id="email-user" wire:model.live='formUser.email' />
                                @error('formUser.email')
                                    <div class="text-sm font-bold text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="gender-user"
                                    class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Gênero</label>
                                <select id="gender-user" class="input text-neutral-700" wire:model='formUser.gender'>
                                    <option value="">Selecione</option>
                                    <option value="female">Feminino</option>
                                    <option value="male">Masculino</option>
                                    <option value="undefined">Não Declarado</option>
                                </select>
                                @error('formUser.gender')
                                    <div class="text-sm font-bold text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="cell_phone-user"
                                    class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Celular</label>
                                <input type="text" class="input" id="cell_phone-user" x-mask="(99)99999-9999"
                                    wire:model='formUser.cellphone' />
                                @error('formUser.cellphone')
                                    <div class="text-sm font-bold text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="cpf-user"
                                    class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Cpf</label>
                                <input type="text" class="input" id="cpf-user" x-mask="999.999.999-99"
                                    wire:model='formUser.cpf' />
                                @error('formUser.cpf')
                                    <div class="text-sm font-bold text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="rg-user"
                                    class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">RG</label>
                                <input type="text" id="rg-user" x-mask="99.999.999-9" class="input"
                                    wire:model='formUser.rg' />
                                @error('formUser.rg')
                                    <div class="text-sm font-bold text-red-400">{{ $message }}</div>
                                @enderror
                            </div>

                            <div id="form-vet" style="display: none">
                                <div class="mb-4">
                                    <label for="qualification"
                                        class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Qualificação</label>
                                    <input type="text" class="input" id="qualification"
                                        wire:model.live='formUser.qualification' />
                                    @error('formUser.qualification')
                                        <div class="text-sm font-bold text-red-400">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="crmv"
                                        class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">CRMV</label>
                                    <input type="text" class="input" id="crmv"
                                        wire:model.live='formUser.crmv' />
                                    @error('formUser.crmv')
                                        <div class="text-sm font-bold text-red-400">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="password-user"
                                    class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Senha</label>
                                <input type="password" class="input" id="password-user"
                                    wire:model='formUser.password' />
                                @error('formUser.password')
                                    <div class="text-sm font-bold text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="password-user-confirm"
                                    class="block text-sm font-medium text-neutral-700 dark:text-neutral-200">Confirme
                                    a
                                    Senha</label>
                                <input type="password" class="input" id="password-user-confirm"
                                    wire:model.live='formUser.passwordConfirm' />
                                @error('formUser.passwordConfirm')
                                    <div class="text-sm font-bold text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!--Modal footer-->
                        <div
                            class="flex flex-wrap items-center justify-end flex-shrink-0 p-4 border-t-2 border-opacity-100 rounded-b-md border-neutral-100 dark:border-opacity-50">
                            <x-secondary-button type='reset' data-te-modal-dismiss data-te-ripple-init
                                data-te-ripple-color="light">
                                {{ __('Cancelar') }}
                            </x-secondary-button>

                            <x-primary-button class="ml-3" type='button' wire:click='createOrEditUser'
                                {{--   data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light" --}}>
                                {{ __('Salvar') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>

</div>
