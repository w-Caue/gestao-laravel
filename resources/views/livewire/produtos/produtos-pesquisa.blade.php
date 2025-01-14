<div>
    <x-modal.modal-large name="produtosPesquisa" title="Pesquisa de" subtitle="produtos">
        @slot('body')
            @slot('icone')
                <x-icons.produtos class="size-10 mr-2 p-2"></x-icons.produtos>
            @endslot

            <div class="relative w-full flex sm:flex-row flex-col justify-between gap-5 px-2">
                <div class="flex items-end justify-between gap-5">
                    <div>
                        <span class="font-bold text-gray-500">Pesquise aqui</span>
                        <div class="flex items-center gap-1">
                            <x-input class="sm:w-80 w-full uppercase tracking-widest" wire:model.defer="search"
                                wire:keydown.enter='dados()'
                                placeholder="Pesquise o produto pelo {{ str_replace('.', '>', $sortField) }}" />

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
                </div>
            </div>

            <div class="w-full overflow-y-auto p-1 block space-y-4 mt-3">
                @foreach ($produtos as $produto)
                    <div wire:key="{{ $produto->ID }}" wire:click="produtoPedido({{ $produto->ID }})"
                        x-on:click="$dispatch('open-modal', { name : 'addProduto' })"
                        class="w-full p-1 font-semibold space-y-2 border rounded-md cursor-pointer transition-all hover:scale-95">
                        <div class="flex gap-6">

                            <div
                                class="relative flex content-center overflow-hidden rounded justify-items-center sm:w-20 w-20">
                                @livewire('produtos.produto-foto')
                            </div>

                            <div class="flex flex-col gap-1">
                                <span class="font-bold text-sm tracking-widest uppercase">
                                    {{ $produto->NOME }}
                                </span>

                                <div class="">
                                    <span class="text-xs tracking-widest uppercase">
                                        {{ $produto->DESCRICAO }}
                                    </span>
                                </div>

                                <div class="flex items-center gap-2 text-center text-sm tracking-wider">
                                    <span>Preço:</span>
                                    R$ {{ number_format($produto->PRECO1, 2, ',') }}
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="flex justify-between items-center mx-4 my-7 py-3">
                @include('includes.porPagina')

                {{-- {{ $clientes->links('components.pagination', ['is_livewire' => true]) }} --}}
            </div>

        @endslot
    </x-modal.modal-large>

    <x-modal.modal-medium name="addProduto" title="Adicionar" subtitle="Item">
        @slot('body')
            <div class="space-y-6 mt-4">
                <div class="flex items-center justify-center gap-6">

                    {{-- <div>
                        <x-inputs.label value="{{ 'Quantidade' }}" />
                        <div class="flex items-center gap-1">
                            <button x-on:click="remove()"
                                class="text-white bg-red-500 p-1 rounded-full transition-all hover:scale-95">
                                <svg class="size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="currentColor">
                                    <path d="M19 11H5V13H19V11Z"></path>
                                </svg>
                            </button>

                            <div class="w-20">
                                <x-input class="text-center" x-model.number="item.qtd" wire:model="quantidade"
                                    x-mask:dynamic="$input.startsWith('37')
                                        ? '999999999' : '999999999'
                                " />
                            </div>

                            <button x-on:click="add()"
                                class="text-white bg-blue-500 p-1 rounded-full transition-all hover:scale-95">
                                <svg class="size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="currentColor">
                                    <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"></path>
                                </svg>
                            </button>
                        </div>
                    </div> --}}

                    {{-- <div class="w-28">
                        <x-inputs.label value="{{ 'Desc. %' }}" />
                        <x-inputs.text type="number" wire:model="desconto" />
                    </div> --}}

                    <div class="flex flex-col items-center">
                        <x-inputs.label value="{{ 'Preço Vendido' }}" />

                        <div class="w-24">
                            {{-- <x-input wire:model="valorUnitario" x-mask:dynamic="$money($input)" /> --}}
                        </div>
                    </div>
                </div>

                {{-- @if ($msgPedido)
                    <h1 class="text-md text-center font-bold uppercase tracking-widest text-orange-500">
                        Esse item já esta no pedido!
                    </h1>
                @endif --}}

                <div class="flex justify-end">
                    <x-buttons.primary>
                        Adicionar
                    </x-buttons.primary>
                </div>
            </div>
        @endslot
    </x-modal.modal-medium>

    {{-- <script>
        function initApp() {
            const app = {
                item: {
                    qtd: 0,
                },
                add() {
                    this.item.qtd++;
                },
                remove() {
                    this.item.qtd--;
                    if (this.item.qtd < 0) {
                        this.item.qtd = 0;
                    }
                },
            };
            return app;
        }
    </script> --}}
</div>
