<div>

    <x-modal.modal-small name="cadastro" title="Criar" subtitle="Pedido">
        @slot('body')
            <div class=" space-y-6">

                <div class="flex flex-col gap-3">
                    <div class="w-full">
                        <div class="flex flex-col items-center">
                            <x-inputs.label value="{{ 'Cliente' }}" />

                            <div class="flex gap-1 w-full">
                                <x-inputs.text wire:model="clientePedido" wire:keydown.enter='data()'
                                    placeholder="Pesquise pelo código" />
                                <x-buttons.primary x-on:click="$dispatch('open-large-modal', { name : 'clientes' })">
                                    <x-icons.search class="size-5" />
                                </x-buttons.primary>
                            </div>
                        </div>
                    </div>

                    <div>
                        <x-inputs.label value="{{ 'forma de pagamento:' }}" />
                        <x-inputs.select class="" wire:model="formaPagamento">
                            <option value=""></option>

                        </x-inputs.select>
                    </div>

                    <div class="w-full">
                        <x-inputs.label value="{{ 'Observação' }}" />
                        <x-inputs.textarea wire:model="observacao" />
                    </div>

                    <div class="w-32">
                        <x-inputs.label value="{{ 'Tipo' }}" />
                        <x-inputs.select class="" wire:model="tipo">
                            <option value="">Selecione</option>

                            <option value="V">Venda</option>
                            <option value="S">Serviço</option>

                        </x-inputs.select>
                    </div>
                </div>

                <div class="flex justify-end">
                    <x-buttons.primary wire:click="save()">Confirmar</x-buttons.primary>
                </div>
            </div>
        @endslot
    </x-modal.modal-small>
</div>
