<div>
    <div class="container mx-auto mt-16">
        <h1 class="text-center text-gray-600 font-semibold text-3xl uppercase tracking-widest">Faça seu Login</h1>

        <div class="flex flex-col items-center mt-16 space-y-6">
            <h1 class="text-gray-400 uppercase text-sm tracking-widest">Insira seu e-mail para se inscrever ou
                entrar.</h1>

            <div class="w-96">
                <x-input class="text-xs tracking-widest" placeholder="Insira o Email" />
            </div>
            <x-button class="uppercase tracking-wider transition-all hover:scale-95" text="Enviar" />

            <x-link href="{{ route('login') }}" class="hover:underline" text="Faça seu login com email e senha" color="secondary" />
        </div>
    </div>
</div>
