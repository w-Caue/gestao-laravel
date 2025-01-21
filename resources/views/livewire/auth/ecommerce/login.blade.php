<div>
    <div x-data="{ view: @this.view }" class="container mx-auto mt-16">
        <h1 class="text-center text-gray-600 font-semibold text-3xl uppercase tracking-widest">Conecte-se</h1>

        <form x-show="@this.view === 1" class="flex flex-col items-center mt-16 space-y-6">
            <h1 class="text-gray-400 uppercase text-sm tracking-widest">Insira seu e-mail para se inscrever ou
                entrar.</h1>

            <div class="w-96">
                <x-input class="text-xs tracking-widest" wire:model="email" placeholder="Insira o Email" />
            </div>
            <x-button wire:click="login()" class="uppercase tracking-wider transition-all hover:scale-95"
                text="Enviar" />

            <x-button x-on:click="view = 2" text="Faça seu login com email e senha" color="secondary" flat />
        </form>

        {{-- FAZER LOGIN --}}
        <form x-show="@this.view === 2" class="flex flex-col items-center mt-16 space-y-6">
            <h1 class="text-gray-400 uppercase text-sm tracking-widest">Insira seu e-mail e senha.</h1>

            <div class="w-96">
                <x-input class="text-xs tracking-widest" wire:model="email" placeholder="Insira o Email" />
            </div>

            <div class="w-96">
                <x-inputs.label value="{{ 'Senha' }}" />
                <x-password class="text-xs tracking-widest" placeholder="*******" />
            </div>

            <x-button x-on:click="view = 2" class="uppercase tracking-wider transition-all hover:scale-95"
                text="Entrar" />
        </form>
        {{-- /FAZER LOGIN --}}

        {{-- FAZER CADASTRO --}}
        <form x-show="@this.view === 3" class="flex flex-col items-center mt-16 space-y-4">

            <div class="w-96">
                <x-inputs.label value="{{ 'Email' }}" />
                <x-input class="text-xs tracking-widest" wire:model="email" placeholder="Insira o Email" />
            </div>

            <div class="w-96">
                <x-inputs.label value="{{ 'Nome' }}" />
                <x-input wire:model="nome" class="text-xs tracking-widest" placeholder="Insira o Nome" />
            </div>

            <div class="w-96">
                <x-inputs.label value="{{ 'Telefone' }}" />
                <x-input class="text-xs tracking-widest" placeholder="Insira o Telefone"
                    x-mask:dynamic="
                $input.startsWith('14') || $input.startsWith('14')
                    ? '99 9 9999 9999' : '99 9 9999 9999'
            " />
            </div>

            <div class="w-96">
                <x-inputs.label value="{{ 'Senha' }}" />
                <x-password wire:model="senha" class="text-xs tracking-widest" placeholder="*******" />
            </div>

            <div class="w-96">
                <x-inputs.label value="{{ 'Confirmar a Senha' }}" />
                <x-password class="text-xs tracking-widest" placeholder="*******" />
            </div>

            <x-button wire:click="save()" class="uppercase tracking-wider transition-all hover:scale-95"
                text="Criar Conta" />
        </form>
        {{-- /FAZER CADASTRO --}}

    </div>
</div>
