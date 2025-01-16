<div class="flex w-full">
    @include('includes.loading')

    <div class="relative w-full hidden sm:block">
        <input wire:model.debounce.2000ms="query" wire:keydown.escape="resetar" wire:keydown.tab="resetar"
            wire:keydown.arrow-up="decrementHighlight" wire:keydown.arrow-down="incrementHighlight"
            wire:keydown.enter="select"
            class="block p-4 w-full font-semibold rounded-lg z-20 text-sm tracking-widest border border-gray-300 focus:outline-none focus:ring-2 active:ring-blue-500"
            placeholder="O que você procura?">

        <button type="submit" class="absolute top-0 right-0 p-4 text-sm font-medium rounded transition-all text-gray-500">
            <svg class="size-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path
                    d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748ZM12.1779 7.17624C11.4834 7.48982 11 8.18846 11 9C11 10.1046 11.8954 11 13 11C13.8115 11 14.5102 10.5166 14.8238 9.82212C14.9383 10.1945 15 10.59 15 11C15 13.2091 13.2091 15 11 15C8.79086 15 7 13.2091 7 11C7 8.79086 8.79086 7 11 7C11.41 7 11.8055 7.06167 12.1779 7.17624Z">
                </path>
            </svg>
        </button>

        {{-- @if (!empty($query))
            <div class="absolute z-10 w-full bg-white rounded-t-none shadow-lg"
                @click.away="window.livewire.emitTo('tenant.ecommerce.pesquisa-produto-nav','resetar');">
                @if (!empty($arr))
                    @foreach ($arr as $i => $produto)
                        <a href="{{ route('tenant.ecommerce.produtos.show', [
                            'nome' => toUrl($produto['DESCRICAO']),
                            'prefix' => tenant()->CLIENTE_SUBDOMINIO,
                        ]) }}"
                            class="flex flex-row p-2 {{ $highlightIndex === $i ? 'bg-gray-100' : '' }}">
                            <div class="h-8">
                                @livewire('tenant.produto.foto-produto', [
                                    'codSeqProduto' => $produto['COD_SEQ'],
                                    key($produto['COD_SEQ']),
                                ])

                            </div>
                            <div class="flex flex-col w-full ml-2 font-semibold">
                                <h1>{{ $produto['DESCRICAO'] }}</h1>
                                <div class="flex flex-row justify-between">
                                    <h2 class="text-blue-500 text-sm">
                                        {{ $produto['MARCA'] }}
                                    </h2>
                                    <h2 class="font-thin text-gray-600">Quantidade disponível
                                        ({{ $produto['UNID_MED_ABREV'] }})
                                        :
                                        {{ (int) $produto['QUANTIDADE_ESTOQUE'] }}
                                    </h2>
                                    <h2 class="font-semibold text-green-700">
                                        {{ formataDinheiro($produto['PRECO']) }} </h2>
                                </div>
                            </div>

                        </a>
                    @endforeach
                @else
                    <div class="bg-red-100">
                        Nenhum produto encontrado
                    </div>
                @endif
            </div>
        @endif --}}

    </div>
</div>
