<div>
    @livewire('servicos.servicos-cards')
    <div class="grid grid-cols-3">
        <div class="col-span-2 p-2 bg-white rounded-lg shadow-2xl dark:bg-gray-800">

            <div class="relative w-full flex sm:flex-row flex-col items-end justify-between gap-5">
                <div class="flex items-end justify-between gap-5">
                    <div class="sm:w-72">
                        <span class="font-bold text-gray-500">Pesquise aqui</span>
                        <div class="flex items-center gap-1">
                            <x-inputs.text wire:model.defer="search" wire:keydown.enter='data()' />

                            <button wire:click=""
                                class="text-white bg-blue-500 p-2 rounded-md transition-all hover:scale-95">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="currentColor">
                                    <path
                                        d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748Z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <x-buttons.primary x-on:click="$dispatch('open-modal', { name : 'cadastro' })"
                    class="flex items-center gap-1">
                    <svg class="size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM11 11H7V13H11V17H13V13H17V11H13V7H11V11Z">
                        </path>
                    </svg>
                    <span>Novo</span>
                </x-buttons.primary>
            </div>

            <div class="w-full overflow-hidden mt-7 rounded-lg shadow-xs hidden lg:block">
                <div class="w-full overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr
                                class="relative text-xs font-semibold tracking-wide text-center text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">
                                    <div class="flex justify-center items-center cursor-pointer">
                                        <button
                                            class="text-xs font-medium leading-4 tracking-wider uppercase">Código</button>
                                    </div>
                                </th>

                                <th class="px-2 py-3">
                                    <div class="flex justify-center items-center cursor-pointer">
                                        <button class="text-xs font-medium leading-4 tracking-wider uppercase">
                                            Descrição
                                        </button>
                                    </div>
                                </th>

                                <th class="px-4 py-3">
                                    <div class="flex justify-center items-center cursor-pointer">
                                        <button class="text-xs font-medium leading-4 tracking-wider uppercase">
                                            Preço
                                        </button>
                                    </div>
                                </th>

                                <th class="px-4 py-3">
                                    <div class="flex justify-center items-center cursor-pointer">
                                        <button class="text-xs font-medium leading-4 tracking-wider uppercase">
                                            Data Cadastro
                                        </button>
                                    </div>
                                </th>

                                <th class="px-4 py-3">
                                    <div class="flex justify-center items-center cursor-pointer">
                                        <button class="text-xs font-medium leading-4 tracking-wider uppercase">
                                            Ação
                                        </button>
                                    </div>
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @foreach ($servicos as $servico)
                                <tr wire:key="{{ $servico->id }}"
                                    class="font-bold text-sm text-gray-700 dark:text-gray-300">
                                    <td class="py-3 text-center">
                                        #{{ $servico->id }}
                                    </td>

                                    <td class="py-3 px-28 text-center">

                                        {{ $servico->descricao }}
                                    </td>

                                    <td class="py-3 pr-8 text-xs text-center">
                                        R$ {{ $servico->preco }}
                                    </td>

                                     <td class="py-3 text-center">
                                    {{ date('d/m/Y', strtotime($servico->data_cadastro)) }}
                                </td>

                                    <td class="py-3 flex justify-center">
                                        <button class="p-2 rounded-full hover:bg-gray-200 dark:hover:bg-gray-700"
                                            wire:click="$dispatchTo('clientes.clientes-register','consulta', { codigo: {{ $servico->id }}})"
                                            x-data x-on:click="$dispatch('large-modal', { name : 'cadastroCompleto' })">
                                            <svg class="size-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <path
                                                    d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748ZM12.1779 7.17624C11.4834 7.48982 11 8.18846 11 9C11 10.1046 11.8954 11 13 11C13.8115 11 14.5102 10.5166 14.8238 9.82212C14.9383 10.1945 15 10.59 15 11C15 13.2091 13.2091 15 11 15C8.79086 15 7 13.2091 7 11C7 8.79086 8.79086 7 11 7C11.41 7 11.8055 7.06167 12.1779 7.17624Z">
                                                </path>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="w-full overflow-y-auto p-4 block lg:hidden space-y-6">
                {{-- @foreach ($clientes as $cliente)
                <div wire:key="{{ $cliente->id }}"
                    wire:click="$dispatchTo('clientes.clientes-register','consulta', { codigo: {{ $cliente->id }}})"
                    x-data x-on:click="$dispatch('large-modal', { name : 'cadastroCompleto' })"
                    class="w-full p-2 rounded-lg space-y-2 border-2 shadow-lg hover:scale-105 dark:hover:shadow-gray-700 transition-all dark:border-gray-700 hover:cursor-pointer">
                    <div class="flex justify-between items-center">
                        <span class="font-bold">#{{ $cliente->id }}</span>

                        <h1 class="font-bold text-xs uppercase tracking-widest">
                            {{ date('d/m/Y', strtotime($cliente->data_cadastro)) }}
                        </h1>

                    </div>

                    <span class="font-bold text-sm tracking-widest uppercase">
                        {{ $cliente->nome }}

                    </span>

                    <div class="flex justify-between items-center flex-wrap text-sm tracking-wider font-semibold">
                        Telefone: {{ $cliente->telefone }}
                    </div>
                </div>
            @endforeach --}}
            </div>

        </div>
    </div>

    <x-modal.modal-medium name="cadastro" title="Cadastrar" subtitle="Serviço">
        @slot('body')
            <div x-data="{ servico: 1 }" class="space-y-6">
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

                <div x-show="servico === 1" class="flex justify-between gap-3 mt-2">

                    <div class="sm:w-96">
                        <x-inputs.label value="{{ 'Descrição*' }}" />
                        <x-inputs.text wire:model="form.descricao" />
                    </div>
                    @error('descricao')
                        <span class="text-sm font-semibold text-red-600 error">{{ $message }}</span>
                    @enderror

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

                <div x-show="servico === 2">
                    <div class="sm:w-32">
                        <x-inputs.label value="{{ 'Preço' }}" />
                        <x-inputs.text wire:model="form.preco" x-mask:dynamic="$money($input, '.', ' ')" />
                    </div>
                    @error('preco')
                        <span class="text-sm font-semibold text-red-600 error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <x-buttons.primary wire:click="save()">
                        salvar
                    </x-buttons.primary>
                </div>

            </div>
        @endslot
    </x-modal.modal-medium>
</div>
