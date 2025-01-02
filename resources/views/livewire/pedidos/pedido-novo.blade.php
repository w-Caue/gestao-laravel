<div>

    <x-modal.modal-small name="cadastro" title="Criar" subtitle="Pedido">
        @slot('body')
            <div class=" space-y-6">

                <div class="flex flex-col gap-3">
                    <div class="w-full">
                        <div class="flex flex-col">
                            <x-inputs.label value="{{ 'Cliente' }}" />

                            <div class="flex gap-1 items-end  w-full">

                                @if ($clientePedido)
                                    <x-input class="w-96 uppercase tracking-widest" value="{{ $clientePedido->NOME }}"
                                        wire:keydown.enter='data()' placeholder="Pesquise pelo código" />
                                @else
                                    <x-input class="w-96 uppercase tracking-widest"
                                        wire:keydown.enter='data()' placeholder="Pesquise pelo código" />
                                @endif

                                <x-buttons.primary x-on:click="$dispatch('open-large-modal', { name : 'clientes' })">
                                    <x-icons.search class="size-5" />
                                </x-buttons.primary>
                            </div>
                        </div>
                    </div>

                    <div>
                        <x-inputs.label value="{{ 'Vendedor:' }}" />
                        <x-inputs.select class="uppercase tracking-widest text-gray-400" wire:model="vendedor">
                            <option value="">Selecione aqui</option>
                            @foreach ($listVendedor as $vendedor)
                                <option class="font-semibold text-gray-600" value="{{ $vendedor->ID }}">{{ $vendedor->NOME }}</option>
                            @endforeach
                        </x-inputs.select>
                    </div>

                    <div>
                        <x-inputs.label value="{{ 'forma de pagamento:' }}" />
                        <x-select.styled class="uppercase tracking-widest" wire:model="pagamento" :placeholders="[
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

                    <div class="w-full">
                        <x-inputs.label value="{{ 'Observação' }}" />
                        <x-textarea wire:model="observacao" resize-auto />
                    </div>
                </div>

                <div class="flex justify-end">
                    <x-buttons.primary wire:click="save()">Confirmar</x-buttons.primary>
                </div>
            </div>
        @endslot
    </x-modal.modal-small>
</div>
