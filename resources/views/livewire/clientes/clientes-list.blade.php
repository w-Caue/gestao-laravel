<div>
    @livewire('clientes.clientes-cards')

    <!-- Loading -->
    @include('includes.loading')
    <!-- ./Loading -->

    <div class="p-2 bg-white rounded-lg shadow-2xl dark:bg-gray-800">

        <div class="relative w-full flex sm:flex-row flex-col items-center justify-between gap-5 px-2">
            <div class="flex items-end justify-between gap-5">
                <div class="sm:w-80">
                    <span class="font-bold text-gray-500">Pesquise aqui</span>
                    <div class="flex items-center gap-1">
                        <x-inputs.text wire:model.defer="search" wire:keydown.enter='dados()'
                            placeholder="Pesquise o cliente pelo {{ str_replace('.', '>', $sortField) }}" />

                        <x-buttons.primary wire:click="dados()">
                            <x-icons.search class="size-5" />
                        </x-buttons.primary>
                    </div>
                </div>
            </div>

            <div x-data="{ filter: false, message: false }" class="relative flex justify-center items-center gap-5">
                <div>
                    <button x-on:click="message = !message;"
                        class="font-bold tracking-widest text-blue-500 bg-blue-200 p-2 rounded-full hover:scale-95 transition-all">
                        <svg class="size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M3 3H12.382C12.7607 3 13.107 3.214 13.2764 3.55279L14 5H20C20.5523 5 21 5.44772 21 6V17C21 17.5523 20.5523 18 20 18H13.618C13.2393 18 12.893 17.786 12.7236 17.4472L12 16H5V22H3V3Z">
                            </path>
                        </svg>
                    </button>

                    <div x-show="message">
                        <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0" @keydown.escape="message = false; "
                            @click.away="message = false;"
                            class="absolute right-0 z-40 w-60 p-5 mt-4 space-y-4 text-gray-600 bg-white border shadow-lg rounded-md dark:shadow-gray-800 dark:text-gray-300 dark:bg-gray-800 dark:border-gray-700"
                            aria-label="submenu">

                            <h1 class="font-bold tracking-wider">Legendas</h1>

                            <div class="space-y-2">
                                <span class="text-xs uppercase text-gray-400 dark:text-gray-500">Letras</span>
                                <div class="mt-2">
                                    <div class="relative flex gap-1 items-center">
                                        <div class="bg-purple-700 p-2 rounded-full"></div>
                                        <x-inputs.label value="{{ 'Inativos' }}" />
                                    </div>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>

                <div>
                    <button x-on:click="filter = !filter;"
                        class="font-bold tracking-widest text-orange-500 bg-orange-200 p-2 rounded-md hover:scale-95 transition-all">
                        <svg class="size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M10 18H14V16H10V18ZM3 6V8H21V6H3ZM6 13H18V11H6V13Z"></path>
                        </svg>
                    </button>

                    <div x-show="filter">
                        <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0" @click.away="filter = false;"
                            class="absolute right-0 z-40 w-60 p-5 mt-4 space-y-4 text-gray-600 bg-white border shadow-lg rounded-md dark:shadow-gray-800 dark:text-gray-300 dark:bg-gray-800 dark:border-gray-700"
                            aria-label="submenu">

                            <span class="font-bold tracking-wider">Filtros</span>
                            <div class="space-y-3">
                                <div
                                    class="inline-flex items-center w-full px-2 py-1  text-xs font-semibold uppercase transition-colors duration-150 ">
                                    <x-checkbox.primary wire:model.live="favoritos" class="mr-2"
                                        id="favoritos"></x-checkbox.primary>

                                    <label for="favoritos">Favoritos</label>
                                </div>
                                <div
                                    class="inline-flex items-center w-full px-2 py-1  text-xs font-semibold uppercase transition-colors duration-150 ">
                                    <x-checkbox.primary wire:model.live="inativos" class="mr-2"
                                        id="inativos"></x-checkbox.primary>

                                    <label for="inativos">Inativos</label>
                                </div>
                            </div>
                        </ul>
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

        </div>

        <div class="w-full overflow-hidden mt-7 px-2 rounded-lg shadow-xs hidden lg:block">
            <div class="w-full overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr x-cloak x-data="{ tooltip: 'nenhum' }"
                            class="relative text-xs font-semibold tracking-wide text-center text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">
                                <div class="flex justify-center">
                                    <div class="flex justify-center items-center cursor-pointer"
                                        wire:click="sortBy('ID')" x-on:mouseover="tooltip = 'cod'"
                                        x-on:mouseleave="tooltip = 'nenhum'">
                                        <button
                                            class="text-xs font-medium leading-4 tracking-wider uppercase">Código</button>
                                        @include('includes.icon-filter', ['field' => 'ID'])
                                    </div>

                                    <div x-cloak x-show="tooltip === 'cod'" x-transition x-transition.duration.300ms
                                        class="absolute z-10 p-2 mt-6 text-xs font-bold bg-gray-100 rounded-md dark:bg-gray-700">
                                        <p>Ordenar pelo o Código</p>
                                    </div>
                                </div>
                            </th>

                            <th class="px-4 py-3">
                                <div class="flex justify-center">
                                    <div class="flex justify-center items-center cursor-pointer"
                                        wire:click="sortBy('NOME')" x-on:mouseover="tooltip = 'nome'"
                                        x-on:mouseleave="tooltip = 'nenhum'">
                                        <button
                                            class="text-xs font-medium leading-4 tracking-wider uppercase">Nome</button>
                                        @include('includes.icon-filter', ['field' => 'NOME'])
                                    </div>

                                    <div x-cloak x-show="tooltip === 'nome'" x-transition x-transition.duration.300ms
                                        class="absolute z-10 p-2 mt-6 text-xs font-bold bg-gray-100 rounded-md dark:bg-gray-700">
                                        <p>Ordenar pelo o Nome</p>
                                    </div>
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
                        @foreach ($clientes as $cliente)
                            <tr wire:key="{{ $cliente->ID }}"
                                class="font-bold text-sm {{ $cliente->inativo == 'S' ? 'text-purple-700' : 'text-gray-700 dark:text-gray-300' }}">
                                <td class="py-3 text-center">
                                    #{{ $cliente->ID }}
                                </td>

                                <td class="py-3 px-28 text-center">

                                    {{ $cliente->NOME }}
                                </td>

                                <td class="py-3 pr-8 text-xs text-center">
                                    {{ $cliente->TELEFONE }}
                                </td>

                                <td class="py-3 text-center">
                                    <button wire:click="setFavoritoList({{ $cliente->ID }})">

                                        <svg class="size-6 {{ $cliente->FAVORITO == 'N' ? '' : 'hidden' }}"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                        </svg>

                                        <svg class="size-6 text-yellow-400 {{ $cliente->FAVORITO == 'S' ? '' : 'hidden' }}"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                clip-rule="evenodd" />
                                        </svg>

                                    </button>
                                </td>

                                <td class="py-3 text-center">
                                    {{ date('d/m/Y', strtotime($cliente->DATA_CADASTRO)) }}
                                </td>

                                <td class="py-3 flex justify-center">
                                    <button class="p-2 rounded-full hover:bg-gray-200 dark:hover:bg-gray-700"
                                        wire:click="$dispatchTo('clientes.clientes-register','consulta', { codigo: {{ $cliente->ID }}})"
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
            @foreach ($clientes as $cliente)
                <div wire:key="{{ $cliente->ID }}"
                    wire:click="$dispatchTo('clientes.clientes-register','consulta', { codigo: {{ $cliente->ID }}})"
                    x-data x-on:click="$dispatch('large-modal', { name : 'cadastroCompleto' })"
                    class="w-full p-2 rounded-lg space-y-2 border-2 shadow-lg hover:scale-105 dark:hover:shadow-gray-700 transition-all dark:border-gray-700 hover:cursor-pointer">
                    <div class="flex justify-between items-center">
                        <span class="font-bold">#{{ $cliente->ID }}</span>

                        <h1 class="font-bold text-xs uppercase tracking-widest">
                            {{ date('d/m/Y', strtotime($cliente->DATA_CADASTRO)) }}
                        </h1>

                    </div>

                    <span class="font-bold text-sm tracking-widest uppercase">
                        {{ $cliente->NOME }}

                    </span>

                    <div class="flex justify-between items-center flex-wrap text-sm tracking-wider font-semibold">
                        Telefone: {{ $cliente->TELEFONE }}
                    </div>
                </div>
            @endforeach
        </div>

    </div>

    @livewire('clientes.clientes-register')

    <x-modal.modal-medium name="cadastro" title="Cadastrar" subtitle="Cliente">
        @slot('body')
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
                        <x-inputs.text wire:model="form.telefone"
                            x-mask:dynamic="
                        $input.startsWith('11') || $input.startsWith('14')
                            ? '9 9999 9999' : '99 9 9999 9999'
                    " />
                    </div>
                    @error('telefone')
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
