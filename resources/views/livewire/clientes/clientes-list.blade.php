<div>
    @livewire('clientes.clientes-cards')

    <div class=" p-2 bg-white rounded-lg shadow-2xl dark:bg-gray-800">

        <div class="relative w-full flex sm:flex-row flex-col items-center justify-between gap-5">
            <div class="flex items-end justify-between gap-5">
                <div class="sm:w-72">
                    <span class="font-bold text-gray-500">Pesquise seu Cliente</span>
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
                        d="M14 14.252V22H4C4 17.5817 7.58172 14 12 14C12.6906 14 13.3608 14.0875 14 14.252ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM18 17V14H20V17H23V19H20V22H18V19H15V17H18Z">
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
                                        Nome
                                    </button>
                                </div>
                            </th>

                            <th class="px-4 py-3">
                                <div class="flex justify-center items-center cursor-pointer">
                                    <button class="text-xs font-medium leading-4 tracking-wider uppercase">
                                        telefone
                                    </button>
                                </div>
                            </th>

                            <th class="px-4 py-3">
                                <div class="flex justify-center items-center cursor-pointer">
                                    <button class="text-xs font-medium leading-4 tracking-wider uppercase">

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
                        @foreach ($clientes as $pedido)
                            <tr wire:key="{{ $pedido->id }}" class="font-bold text-sm text-gray-700">
                                <td class="py-3 text-center">
                                    #{{ $pedido->id }}
                                </td>

                                <td class="py-3 px-28 text-center">

                                    {{ $pedido->nome }}
                                </td>

                                <td class="py-3 pr-8 text-xs text-center">
                                    {{ $pedido->telefone }}
                                </td>

                                <td class="py-3 text-center">

                                </td>

                                <td class="py-3 text-center">
                                    {{ date('d/m/Y', strtotime($pedido->data_cadastro)) }}
                                </td>

                                <td class="py-3 flex justify-center">
                                    <a href="">
                                        <svg class="size-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path
                                                d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748ZM12.1779 7.17624C11.4834 7.48982 11 8.18846 11 9C11 10.1046 11.8954 11 13 11C13.8115 11 14.5102 10.5166 14.8238 9.82212C14.9383 10.1945 15 10.59 15 11C15 13.2091 13.2091 15 11 15C8.79086 15 7 13.2091 7 11C7 8.79086 8.79086 7 11 7C11.41 7 11.8055 7.06167 12.1779 7.17624Z">
                                            </path>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="w-full overflow-y-auto p-4 block lg:hidden space-y-6">
            {{-- @foreach ($pedidos as $pedido)
                    <div wire:key="{{ $pedido->COD_SEQ }}"
                        class="w-full p-2 rounded-lg space-y-2 border-2 shadow-lg hover:scale-105 dark:hover:shadow-gray-700 transition-all dark:border-gray-700 hover:cursor-pointer">
                        <div class="flex justify-between items-center">
                            <span class="font-bold">#{{ $pedido->COD_SEQ }}</span>
        
                            <h1 class="font-bold text-xs uppercase tracking-widest">
                                {{ date('d/m/Y', strtotime($pedido->AUTENTICADO_DATA)) }}
                                {{ date('h:m', strtotime($pedido->HORA_AUTENTICACAO)) }}
                            </h1>
        
                        </div>
        
                        <span class="font-bold text-sm tracking-widest uppercase">
                            {{ convert($pedido->COD_CLIENTE) }} -
                            {{ convert($pedido->NOME) }}
                        </span>
        
                        <div class="flex justify-between items-center flex-wrap text-sm tracking-wider font-semibold">
                            <div class="flex items-center gap-2 py-3 text-center">
                                <span>Vl. Pedido:</span>
                                {{ number_format($pedido->TOTAL, 2, ',', '.') }}
                            </div>
        
        
                            <div class="flex items-center gap-2 py-3 text-center">
                                <span>N. Volumens:</span>
                                {{ convert($pedido->N_VOLUMES) }}
                            </div>
                        </div>
        
                        <div class="flex justify-between items-center flex-wrap text-sm tracking-wider font-semibold">
                            <div class="flex items-center gap-2 text-center">
                                <span>Longitude:</span>
                                {{ $pedido->LONGITUDE }}
                            </div>
                        </div>
        
                        <div class="flex justify-between items-center flex-wrap text-sm tracking-wider font-semibold">
                            <div class="flex items-center gap-2 text-center">
                                <span>Latitude:</span>
                                {{ $pedido->LATITUDE }}
                            </div>
                        </div>
                    </div>
                @endforeach --}}
        </div>

    </div>

    <x-modal.modal-medium name="cadastro" title="Cadastrar" subtitle="Cliente">
        @slot('body')

            @slot('icone')
                {{-- <x-icons.pessoas class="size-10 mr-2 p-2"></x-icons.pessoas> --}}
            @endslot

            <div class="space-y-6">

                <div class="flex flex-wrap gap-3">

                    <div class="sm:w-72">
                        <x-inputs.label value="{{ 'Nome*' }}" />
                        <x-inputs.text wire:model="form.nome" />
                    </div>
                    @error('nome')
                        <span class="text-sm font-semibold text-red-600 error">{{ $message }}</span>
                    @enderror

                    <div class="sm:w-72">
                        <x-inputs.label value="{{ 'Email' }}" />
                        <x-inputs.text wire:model="form.email" />
                    </div>

                    @error('email')
                        <span class="text-sm font-semibold text-red-600 error">{{ $message }}</span>
                    @enderror

                    <div class="w-44">
                        <x-inputs.label value="{{ 'Telefone' }}" />
                        <x-inputs.text wire:model="form.telefone" />
                    </div>
                    @error('telefone')
                        <span class="text-sm font-semibold text-red-600 error">{{ $message }}</span>
                    @enderror

                    {{-- <div class="w-44">
                        <x-inputs.label value="{{ 'Data do Cadastro' }}" />
                        <x-inputs.text type="date" wire:model="form.dataCadastro" />
                    </div>
                    @error('telefone')
                        <span class="text-sm font-semibold text-red-600 error">{{ $message }}</span>
                    @enderror --}}
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
