<div>

    <div class="grid sm:grid-cols-5 items-start gap-5">
        <div class="sm:col-span-3 space-y-5">
            <div class="p-2 bg-white rounded-lg shadow-2xl dark:bg-gray-800">
                <span class="text-sm font-semibold uppercase tracking-widest text-gray-500">Informações</span>

                <div class="space-y-1">
                    <div>
                        <x-inputs.label value="{{ 'Cliente' }}" />
                        <x-input wire:model="form.cliente" class="uppercase tracking-widest" />
                    </div>

                    <div>
                        <x-inputs.label value="{{ 'Vendedor' }}" />
                        <x-input wire:model="form.vendedor" class="uppercase tracking-widest" />
                    </div>
                </div>

                <div class="flex gap-2 mt-3">
                    <div>
                        <x-inputs.label value="{{ 'Data' }}" />
                        <x-date wire:model="form.dataCriacao" format="DD/MM/YYYY" class="uppercase tracking-widest" />
                    </div>

                    <div>
                        <x-inputs.label value="{{ 'Pagamento' }}" />
                        <x-select.styled wire:model="form.pagamento" class="uppercase tracking-widest" :placeholders="[
                            'default' => 'SELECIONE AQUI',
                            'search' => 'PESQUISE O PAGAMENTO',
                            'empty' => 'SEM INFORMAÇÃO',
                        ]"
                            :options="[
                                ['label' => 'DINHEIRO', 'value' => 'D'],
                                ['label' => 'PIX', 'value' => 'P'],
                                ['label' => 'CARTÃO DE CREDITO', 'value' => 'CC'],
                                ['label' => 'CARTÃO DE DEBITO', 'value' => 'CD'],
                            ]" select="label:label|value:value" searchable />
                    </div>
                </div>
            </div>

            <div class="p-2 bg-white rounded-lg shadow-2xl dark:bg-gray-800">
                <div class="flex justify-between">
                    <span class="text-sm font-semibold uppercase tracking-widest text-gray-500">Itens</span>

                    <x-button text="Adicionar Item"
                        {{-- wire:click="$dispatchTo('produtos.produtos-pesquisa','setPedido', { codigo: {{ $form->codigo }}})" --}}
                        x-on:click="$dispatch('open-large-modal', { name : 'produtosPesquisa' })" />
                </div>

                <div class="w-full overflow-y-auto my-3 block">


                    {{-- @foreach ($produtos as $produto) --}}
                    <div class="w-full p-1 font-semibold space-y-2 transition-all border rounded-md">
                        <div class="flex gap-6">

                            <div
                                class="relative flex content-center overflow-hidden rounded justify-items-center sm:w-20 w-20">
                                @livewire('produtos.produto-foto')
                            </div>

                            <div class="flex justify-between w-full gap-1">
                                <div>
                                    <span class="font-bold text-sm tracking-widest uppercase">
                                        nnnn
                                    </span>

                                    <div class="">
                                        <span class="text-xs tracking-widest uppercase">
                                            dddd
                                        </span>
                                    </div>
                                </div>

                                <div class="m-4">
                                    <div class="flex items-center gap-2 text-center text-sm tracking-wider">
                                        R$
                                    </div>
                            {{-- 
                                    <div>
                                        <div class="flex items-center gap-1">
                                            <button x-on:click="remove()"
                                                class="text-white bg-red-500 p-1 rounded-full transition-all hover:scale-95">
                                                <svg class="size-5" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <path d="M19 11H5V13H19V11Z"></path>
                                                </svg>
                                            </button>

                                            <div class="w-20">
                                                <x-input class="text-center" x-model.number="item.qtd"
                                                    wire:model="quantidade"
                                                    x-mask:dynamic="$input.startsWith('37')
                                                            ? '999999999' : '999999999'
                                                    " />
                                            </div>

                                            <button x-on:click="add()"
                                                class="text-white bg-blue-500 p-1 rounded-full transition-all hover:scale-95">
                                                <svg class="size-5" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @endforeach --}}
                </div>
            </div>

        </div>

        <div class="sm:col-span-2 p-2 bg-white rounded-lg shadow-2xl dark:bg-gray-800">
            <div class="my-4">
                <div>
                    <x-inputs.label value="{{ 'Observação' }}" />
                    <x-textarea wire:model="form.observacao" class="uppercase tracking-widest" resize-auto />
                </div>
            </div>

            <span class="text-sm font-semibold uppercase tracking-widest text-gray-500">Totais</span>

            <div class="mt-5 space-y-1">
                <div class="flex justify-between">
                    <x-inputs.label value="{{ 'Total dos itens:' }}" />

                    <span>00,00</span>
                </div>

                <div class="flex justify-between">
                    <x-inputs.label value="{{ 'Desconto:' }}" />

                    <span>00,00</span>
                </div>

                <div class="flex justify-between">
                    <x-inputs.label value="{{ 'Entrega:' }}" />

                    <span>00,00</span>
                </div>

                <div class="flex justify-between">
                    <x-inputs.label value="{{ 'Total do Pedido:' }}" />

                    <span>00,00</span>
                </div>
            </div>
        </div>
        
        
    </div>
    
    @livewire('produtos.produtos-pesquisa')
</div>
