<!-- DESKTOP -->
<div class="flex justify-between">

    <div
        class="flex-shrink-0 bg-white transition-all duration-300 mx-5 my-4 rounded-lg shadow-lg shadow-gray-300 p-4 hidden lg:block dark:bg-gray-800 dark:shadow-gray-700">

        <div class="flex items-center gap-2">

            {{-- @if (session('logoFilial'))
                <img class="w-10 rounded" src="data:image/jpeg;base64,{{ session('logoFilial') }}"
                    alt="logo {{ filial(null, ['NOME_FANTASIA'])->NOME_FANTASIA ?? '' }}">
            @else
                <img aria-hidden="true" class="w-10 rounded" src="{{ asset('img/logo.jpeg') }}" alt="Rica Informática" />
            @endif --}}

            <span class="text-blue-500 font-black dark:text-white" x-bind:class="sidebar.full ? '' : 'hidden'">
                {{-- {{ filial(null, ['NOME_FANTASIA'])->NOME_FANTASIA ?? '' }} --}}
            </span>
        </div>
        <div class="relative justify-center items-center mt-4 space-y-4 text-sm font-bold">

            <div class="border dark:border-gray-700"></div>

            {{-- HOME --}}
            <a href="{{ route('admin.dashboard') }}"
                class="relative w-full flex justify-between items-center space-x-2 p-2 cursor-pointer {{ request()->routeIs('admin.dashboard') ? 'text-blue-500 border-l-2 border-blue-500 ' : 'text-gray-400 hover:text-blue-500' }}">
                <div class="w-full flex flex-col justify-center items-center">
                    <x-icons.inicio class="size-6"></x-icons.inicio>

                    <h1>
                        Inicio
                    </h1>
                </div>
            </a>

            {{-- <div class="text-center">
                <span class="font-extrabold text-gray-300 dark:text-gray-500">Páginas</span>
            </div> --}}

            <a href="{{ route('admin.clientes.listagem') }}"
                class="relative flex justify-between items-center space-x-2 p-2 cursor-pointer {{ request()->routeIs('admin.clientes.*') ? 'text-blue-500 border-l-2 border-blue-500 ' : 'text-gray-400 hover:text-blue-500' }}">
                <div class="w-full flex flex-col justify-center items-center">
                    <x-icons.clientes class="size-6"></x-icons.clientes>

                    <h1>
                        Clientes
                    </h1>
                </div>
            </a>

            <a href="{{ route('admin.pedidos.listagem') }}"
                class="relative flex justify-between items-center space-x-2 p-2 cursor-pointer {{ request()->routeIs('admin.pedidos.*') ? 'text-blue-500 border-l-2 border-blue-500 ' : 'text-gray-400 hover:text-blue-500' }}">
                <div class="w-full flex flex-col justify-center items-center">
                    <x-icons.pedidos class="size-6"></x-icons.pedidos>

                    <h1>
                        Pedidos
                    </h1>
                </div>
            </a>

            <div class="border dark:border-gray-700"></div>

            <a href="{{ route('admin.funcionarios.listagem') }}"
                class="relative flex justify-between items-center space-x-2 p-2 cursor-pointer {{ request()->routeIs('admin.funcionarios.*') ? 'text-blue-500 border-l-2 border-blue-500 ' : 'text-gray-400 hover:text-blue-500' }}">
                <div class="w-full flex flex-col justify-center items-center">
                    <x-icons.funcionarios class="size-6"></x-icons.funcionarios>

                    <h1>
                        Funcionários
                    </h1>
                </div>
            </a>
        </div>
    </div>
</div>
<!-- /DESKTOP -->
