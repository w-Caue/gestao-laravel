<header class="py-2 border-b-2 mx-5 mt-7 border-gray-300 dark:border-gray-700">
    <div class="flex items-center justify-between">
        <div class="flex my-1 space-x-3">
            <button x-on:click="sidebar.navOpen = !sidebar.navOpen"
                class="block lg:hidden focus:outline-none dark:text-white">
                <!-- Menu Icon -->
                <svg class="w-6 h-6" x-bind:class="sidebar.navOpen ? 'hidden' : ''" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24" fill="currentColor">
                    <path d="M3 4H21V6H3V4ZM3 11H21V13H3V11ZM3 18H21V20H3V18Z"></path>
                </svg>

                <!-- Close Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6" x-bind:class="sidebar.navOpen ? '' : 'hidden'">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>

            </button>

            <div>
                @hasSection('titulo')
                    <h1 class="text-lg uppercase tracking-widest font-bold text-blue-500">@yield('titulo')</h1>
                    <span
                        class="text-sm uppercase tracking-widest font-bold text-orange-500">@yield('subtitulo')</span>
                @endif
            </div>
        </div>

        <ul class="flex justify-center items-center flex-shrink-0 space-x-10">
            <li>
                {{-- <button x-data x-on:click="$dispatch('open-modal', { name : 'pesquisaGeral' })" class="text-blue-500 p-2 hover:bg-gray-300 rounded-full dark:hover:bg-gray-700">
                    <x-icons.search class="size-6"></x-icons.search>
                </button> --}}
            </li>

            <li class="flex">
                <button class="rounded-md focus:outline-none focus:shadow-outline-purple"
                    @click="isDarkMode = !isDarkMode" aria-label="Toggle color mode">
                    <template x-if="isDarkMode">
                        <svg class="w-6 h-6 text-blue-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                    </template>
                    <template x-if="!isDarkMode">
                        <svg class="w-6 h-6 text-yellow-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </template>
                </button>
            </li>

            <!-- Profile menu -->
            <li x-title="NavBar:ProfileMenu" x-data="{ isProfileMenuOpen: false }" class="relative" wfd-id="105">
                <button class="flex items-center gap-3 text-blue-500"
                    x-on:click="isProfileMenuOpen = !isProfileMenuOpen;" @keydown.escape="isProfileMenuOpen = false"
                    @click.away="isProfileMenuOpen = false;" aria-label="Account" aria-haspopup="true" wfd-id="146">

                    <div class="bg-blue-300 p-1 rounded-full text-blue-500">
                        <svg class="size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M20 22H4V20C4 17.2386 6.23858 15 9 15H15C17.7614 15 20 17.2386 20 20V22ZM12 13C8.68629 13 6 10.3137 6 7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7C18 10.3137 15.3137 13 12 13Z">
                            </path>
                        </svg>
                    </div>


                    <span class="text-md font-bold tracking-widest hidden sm:block">
                        Conta
                    </span>

                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M11.9999 13.1714L16.9497 8.22168L18.3639 9.63589L11.9999 15.9999L5.63599 9.63589L7.0502 8.22168L11.9999 13.1714Z">
                        </path>
                    </svg>
                </button>

                <template x-if="isProfileMenuOpen">
                    <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0" @keydown.escape="isProfileMenuOpen = false; "
                        class="absolute right-0 z-40 w-56 p-5 mt-4 space-y-4 text-gray-600 bg-white shadow-lg rounded-md dark:shadow-gray-800 dark:text-gray-300 dark:bg-gray-800"
                        aria-label="submenu">

                        <li>
                            <div class="uppercase tracking-widest">
                                <span class="text-xs dark:text-gray-400">Acessando como:</span>
                                {{-- <h1 class="text-md">{{ auth()->guard('tenant')->user()->LOGIN ?? '' }}</h1> --}}
                            </div>
                        </li>

                        <div class="border dark:border-gray-700"></div>

                        <li class="flex">
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="inline-flex items-center w-full py-1 text-xs font-semibold uppercase transition-colors duration-150 rounded-md hover:bg-red-100 hover:text-gray-800 dark:hover:bg-red-800 dark:hover:text-gray-200">
                                <svg class="w-5 h-5 mr-3" aria-hidden="true" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path
                                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                    </path>
                                </svg>
                                <span>Sair</span>
                            </a>
                            <form id="logout-form"
                                action="{{ route('logout') }}"
                                method="GET" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </template>
            </li>
            <!-- Profile menu -->
        </ul>
    </div>

    {{-- @livewire('tenant.pesquisa-geral') --}}
</header>
