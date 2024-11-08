<div class="flex flex-col gap-4">
    <div>
        <x-inputs.label value="Usuário" />
        <x-inputs.text wire:model="usuario" />
    </div>

    <div>
        <x-inputs.label value="Senha" />
        <x-inputs.text wire:model="senha" type="password" />
    </div>

    <div class="flex justify-center">
        <x-buttons.primary wire:click="login">Entrar</x-buttons.primary>
    </div>
</div>
