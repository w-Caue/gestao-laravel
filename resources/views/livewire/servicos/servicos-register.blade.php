<div class="">

    <x-modal.modal-large name="cadastroCompleto" title="Cadastro" subtitle="Completo">
        @slot('body')
            <div x-data="{ servico: 1 }">
                <div
                    class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
                    <ul class="flex flex-wrap text-xs font-bold tracking-widest">
                        <li class="me-2">
                            <button x-on:click="servico = 1"
                                :class="{ 'border-blue-500 border-b-2  text-blue-500': servico === 1 }"
                                class="inline-block uppercase p-4 rounded-t-lg hover:text-gray-600 hover:border-b-2 hover:border-gray-300 dark:hover:text-gray-300">
                                Cadastro
                            </button>
                        </li>
                        <li class="me-2">
                            <button x-on:click="servico = 2"
                                :class="{ 'border-blue-500 border-b-2  text-blue-500': servico === 2 }"
                                class="inline-block uppercase p-4 rounded-t-lg hover:text-gray-600 hover:border-b-2 hover:border-gray-300 dark:hover:text-gray-300">
                                Precificação
                            </button>
                        </li>
                    </ul>
                </div>

                <div x-show="servico === 1" class="mt-3 mx-6">

                    <div class="flex gap-2">
                        <div class="w-full">
                            <div
                                class="inline-flex items-center w-full text-xs font-semibold uppercase transition-colors duration-150 ">
                                <x-checkbox.primary wire:model.live="form.inativo" class="mr-2"
                                    id="inativo"></x-checkbox.primary>

                                <x-inputs.label value="{{ 'Inativo' }}" />
                            </div>

                            <div class="w-full">
                                <x-inputs.label value="{{ 'Descrição*' }}" />
                                <x-inputs.text wire:model="form.descricao" />
                            </div>
                            @error('descricao')
                                <span class="text-sm font-semibold text-red-600 error">{{ $message }}</span>
                            @enderror

                            <div class="sm:w-44 w-32">
                                <x-inputs.label value="{{ 'Dt. Cadastro' }}" />
                                <x-inputs.text type="date" wire:model="form.dataCadastro" />
                            </div>
                        </div>

                        <div class="w-56">
                            <div class="flex items-center justify-center w-full mt-2">
                                <label for="dropzone-file"
                                    class="flex flex-col items-center justify-center w-full h-44 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6 text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-8 h-8 mb-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>

                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                class="font-semibold">Clique
                                                para inserir</span></p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG
                                        </p>
                                    </div>
                                    <input id="dropzone-file" wire:model="form.imagem" type="file" x-ref="input"
                                        class="hidden" />
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end mt-5">
                        <x-buttons.primary wire:click="update()">
                            salvar
                        </x-buttons.primary>
                    </div>
                </div>

                <div x-show="servico === 2" class="mt-3 mx-6">
                    <div class="w-32">
                        <x-inputs.label value="{{ 'Preço' }}" />
                        <x-inputs.text wire:model="form.preco" x-mask:dynamic="$money($input, '.', ' ')" />
                    </div>
                    @error('preco')
                        <span class="text-sm font-semibold text-red-600 error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        @endslot
    </x-modal.modal-large>

</div>
