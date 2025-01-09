<div>
    <x-modal.modal-extra-large name="cadastroCompleto" title="Cadastro" subtitle="Completo">
        @slot('body')
            <div class="grid sm:grid-cols-3 gap-1">
                <div class="sm:col-span-2 space-y-1">
                    <span class="text-sm font-semibold uppercase tracking-widest text-gray-500">Informações</span>
                    <div class="">
                        <x-inputs.label value="{{ 'Nome*' }}" />
                        <x-input class="uppercase tracking-widest" wire:model="form.nome" />
                    </div>
                    @error('nome')
                        <span class="text-sm font-semibold text-red-600 error">{{ $message }}</span>
                    @enderror

                    <div class="">
                        <x-inputs.label value="{{ 'Descrição*' }}" />
                        <x-input class="uppercase tracking-widest" wire:model="form.descricao" />
                    </div>
                    @error('nome')
                        <span class="text-sm font-semibold text-red-600 error">{{ $message }}</span>
                    @enderror

                    <div class="w-60">
                        <x-inputs.label value="{{ 'Tamanhos:' }}" />
                        <x-select.styled class="uppercase tracking-widest" wire:model="form.tamanhos" :placeholders="[
                            'default' => 'SELECIONE AQUI',
                            'search' => 'PESQUISE',
                            'empty' => 'SEM INFORMAÇÃO',
                        ]"
                            :options="[
                                ['label' => 'PP', 'value' => 'PP'],
                                ['label' => 'P', 'value' => 'P'],
                                ['label' => 'M', 'value' => 'M'],
                                ['label' => 'G', 'value' => 'G'],
                                ['label' => 'GG', 'value' => 'GG'],
                            ]" select="label:label|value:value" searchable multiple />
                    </div>

                    <div class="mt-2 space-y-2">
                        <span class="text-sm font-semibold uppercase tracking-widest text-gray-500">Precificação</span>

                        <div class="flex gap-2">
                            <div class="w-32">
                                <x-inputs.label value="{{ 'Varejo' }}" />
                                <x-input class="uppercase tracking-widest" wire:model="form.preco1"
                                    x-mask:dynamic="$money($input)" />
                            </div>

                            <div class="w-32">
                                <x-inputs.label value="{{ 'Atacado' }}" />
                                <x-input class="uppercase tracking-widest" wire:model="form.preco2"
                                    x-mask:dynamic="$money($input)" />
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <form enctype="multipart/form-data" class="flex flex-col items-center space-y-6">
                        <x-inputs.label value="{{ 'Foto' }}" />
                        <div class="shrink-0">
                            <img id='preview_img' wire:model="photo" class="h-24 w-24 object-cover rounded-md"
                                src="{{ asset('img/foto.png') }}" alt="Current profile photo" />
                        </div>
                        <label class="block">
                            <span class="sr-only">Choose profile photo</span>
                            <input type="file" onchange="loadFile(event)"
                                class="block w-44 text-sm text-slate-500
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-full file:border-0
                        file:text-sm file:font-semibold file:uppercase 
                        file:bg-violet-50 file:text-violet-700
                        hover:file:bg-violet-100
                      " />
                        </label>
                    </form>
                </div>

            </div>
        @endslot
    </x-modal.modal-extra-large>
</div>
