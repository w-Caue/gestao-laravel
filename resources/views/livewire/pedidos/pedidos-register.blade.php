<div>
    <x-modal.modal-extra-large name="pedidoCompleto" title="Pedido" subtitle="Completo">
        @slot('body')
            <div class="grid sm:grid-cols-5 gap-5  overflow-y-auto h-1/2">
                <div class="sm:col-span-3 mx-3">
                    <div>
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
                                ]" :options="[
                                    ['label' => 'DINHEIRO', 'value' => 'D'],
                                    ['label' => 'PIX', 'value' => 'P'],
                                    ['label' => 'CARTÃO DE CREDITO', 'value' => 'CC'],
                                    ['label' => 'CARTÃO DE DEBITO', 'value' => 'CD'],
                                ]"
                                    select="label:label|value:value" searchable />
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <x-button text="Adicionar Item"  x-on:click="$dispatch('open-large-modal', { name : 'produtos' })"/>
                    </div>

                    <div class="w-full overflow-y-auto my-3 block h-44">

                        <span class="text-sm font-semibold uppercase tracking-widest text-gray-500">Itens</span>

                        {{-- @foreach ($produtos as $produto) --}}
                        <div class="w-full p-2 font-semibold space-y-2 transition-all">
                            <div class="flex gap-3">

                                <div class="relative flex content-center overflow-hidden rounded justify-items-center">
                                    {{-- @livewire('produtos.produtos.foto-produto', ['codSeqProduto' => $produto->COD_SEQ], key($produto->COD_SEQ)) --}}
                                    foto
                                </div>

                                <div class="flex flex-col gap-1">
                                    <span class="font-bold text-xs tracking-widest uppercase">
                                        Nome prod
                                    </span>

                                    <div class="">
                                        <span class="text-xs tracking-widest uppercase">
                                            Marca
                                        </span>
                                    </div>

                                    <div class="flex items-center gap-2 text-center text-sm tracking-wider">
                                        <span>Preço:</span>
                                        R$ 00,00
                                    </div>

                                    <div class="flex items-center gap-2 text-center text-sm tracking-wider">
                                        <span>Estoque</span>

                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- @endforeach --}}
                    </div>

                </div>

                <div class="sm:col-span-2 mx-3">
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
        @endslot
    </x-modal.modal-extra-large>
</div>
