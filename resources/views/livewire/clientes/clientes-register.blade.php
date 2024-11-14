<div class="">


    <x-modal.modal-large name="cadastroCompleto" title="Cadastro" subtitle="Completo">
        @slot('body')
            <div x-data="{ cliente: 1 }">
                <div
                    class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
                    <ul class="flex flex-wrap text-xs font-bold tracking-widest">
                        <li class="me-2">
                            <button x-on:click="cliente = 1"
                                :class="{ 'border-blue-500 border-b-2  text-blue-500': cliente === 1 }"
                                class="inline-block uppercase p-4 rounded-t-lg hover:text-gray-600 hover:border-b-2 hover:border-gray-300 dark:hover:text-gray-300">
                                Cadastro
                            </button>
                        </li>
                        <li class="me-2">
                            <button x-on:click="cliente = 2"
                                :class="{ 'border-blue-500 border-b-2  text-blue-500': cliente === 2 }"
                                class="inline-block uppercase p-4 rounded-t-lg hover:text-gray-600 hover:border-b-2 hover:border-gray-300 dark:hover:text-gray-300">
                                Serviços
                            </button>
                        </li>
                    </ul>
                </div>

                <div x-show="cliente === 1" class="mt-3 mx-6">
                    <div class="flex flex-wrap gap-3 mt-3">

                        <div class="sm:w-72 w-full">
                            <x-inputs.label value="{{ 'Nome*' }}" />
                            <x-inputs.text wire:model="form.nome" />
                        </div>
                        @error('nome')
                            <span class="text-sm font-semibold text-red-600 error">{{ $message }}</span>
                        @enderror

                        <div class="sm:w-72 w-full">
                            <x-inputs.label value="{{ 'Email' }}" />
                            <x-inputs.text wire:model="form.email" />
                        </div>

                        @error('email')
                            <span class="text-sm font-semibold text-red-600 error">{{ $message }}</span>
                        @enderror

                        <div class="sm:w-44 w-32">
                            <x-inputs.label value="{{ 'Telefone' }}" />
                            <x-inputs.text wire:model="form.telefone"
                                x-mask:dynamic="
                                $input.startsWith('11') || $input.startsWith('14')
                                 ? '9 9999 9999' : '99 9 9999 9999'
                                 " />
                        </div>
                        @error('telefone')
                            <span class="text-sm font-semibold text-red-600 error">{{ $message }}</span>
                        @enderror

                        <div class="sm:w-44 w-32">
                            <x-inputs.label value="{{ 'Dt. Cadastro' }}" />
                            <x-inputs.text type="date" wire:model="form.dataCadastro" />
                        </div>
                    </div>

                    <div class="flex justify-end mt-2">
                        <x-buttons.primary wire:click="update()">
                            salvar
                        </x-buttons.primary>
                    </div>
                </div>

                <div x-show="cliente === 2" class="mt-3 mx-6">

                </div>
            </div>
        @endslot
    </x-modal.modal-large>

</div>
