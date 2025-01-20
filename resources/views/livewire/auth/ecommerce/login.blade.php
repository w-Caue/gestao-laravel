<div>
    <div x-data="{ login: 1 }" class="container mx-auto mt-16">
        <h1 class="text-center text-gray-600 font-semibold text-3xl uppercase tracking-widest">Conecte-se</h1>

        <div x-show="login === 1" class="flex flex-col items-center mt-16 space-y-6">
            <h1 class="text-gray-400 uppercase text-sm tracking-widest">Insira seu e-mail para se inscrever ou
                entrar.</h1>

            <div class="w-96">
                <x-input class="text-xs tracking-widest" placeholder="Insira o Email" />
            </div>
            <x-button x-on:click="login = 2" class="uppercase tracking-wider transition-all hover:scale-95"
                text="Enviar" />

            <x-link href="{{ route('login') }}" class="hover:underline" text="Faça seu login com email e senha"
                color="secondary" />
        </div>

        <div x-show="login === 2" class="flex flex-col items-center mt-16 space-y-4">

            <div class="w-96">
                <x-inputs.label value="{{ 'Email' }}" />
                <x-input class="text-xs tracking-widest" placeholder="Insira o Email" />
            </div>

            <div class="w-96">
                <x-inputs.label value="{{ 'Nome' }}" />
                <x-input class="text-xs tracking-widest" placeholder="Insira o Nome" />
            </div>

            <div class="w-96">
                <x-inputs.label value="{{ 'Telfone' }}" />
                <x-input class="text-xs tracking-widest" placeholder="Insira o Telfone" />
            </div>

            <div class="w-96">
                <x-inputs.label value="{{ 'Senha' }}" />
                <x-password class="text-xs tracking-widest" placeholder="*******" />
            </div>

            <div class="w-96">
                <x-inputs.label value="{{ 'Confirmar a Senha' }}" />
                <x-password class="text-xs tracking-widest" placeholder="*******" />
            </div>

            <x-button class="uppercase tracking-wider transition-all hover:scale-95" text="Criar" />
        </div>
    </div>
</div>
