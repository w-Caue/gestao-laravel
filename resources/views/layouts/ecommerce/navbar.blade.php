<header class="navbar sticky top-0 z-30 sm:z-30 ">
    <div class="flex flex-col lg:flex-row justify-around items-center px-7 py-3 bg-white">
        <div class="flex w-full lg:w-auto items-center justify-between">
            <a href="/" class="flex items-center gap-2 text-lg">
                <img class="w-10 h-10" src="" alt="logo rica informática">

                <span class="font-bold text-slate-800 dark:text-white">My Louja</span>
            </a>
            <div class="flex gap-2 items-start lg:hidden">

                <!-- Theme toggler -->
                <li class="block lg:hidden">
                    <button class="focus:outline-none focus:shadow-outline-purple text-gray-400 dark:text-white"
                        onclick="window.location.reload(true);" @click="isDarkMode = !isDarkMode"
                        aria-label="Toggle color mode">
                        <template x-if="!isDarkMode">
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M12 18C8.68629 18 6 15.3137 6 12C6 8.68629 8.68629 6 12 6C15.3137 6 18 8.68629 18 12C18 15.3137 15.3137 18 12 18ZM12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16ZM11 1H13V4H11V1ZM11 20H13V23H11V20ZM3.51472 4.92893L4.92893 3.51472L7.05025 5.63604L5.63604 7.05025L3.51472 4.92893ZM16.9497 18.364L18.364 16.9497L20.4853 19.0711L19.0711 20.4853L16.9497 18.364ZM19.0711 3.51472L20.4853 4.92893L18.364 7.05025L16.9497 5.63604L19.0711 3.51472ZM5.63604 16.9497L7.05025 18.364L4.92893 20.4853L3.51472 19.0711L5.63604 16.9497ZM23 11V13H20V11H23ZM4 11V13H1V11H4Z">
                                </path>
                            </svg>
                        </template>
                        <template x-if="isDarkMode">
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M10 7C10 10.866 13.134 14 17 14C18.9584 14 20.729 13.1957 21.9995 11.8995C22 11.933 22 11.9665 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C12.0335 2 12.067 2 12.1005 2.00049C10.8043 3.27098 10 5.04157 10 7ZM4 12C4 16.4183 7.58172 20 12 20C15.0583 20 17.7158 18.2839 19.062 15.7621C18.3945 15.9187 17.7035 16 17 16C12.0294 16 8 11.9706 8 7C8 6.29648 8.08133 5.60547 8.2379 4.938C5.71611 6.28423 4 8.9417 4 12Z">
                                </path>
                            </svg>
                        </template>
                    </button>
                </li>

                <button @click="navBar = !navBar" class="text-gray-800 dark:text-white">
                    <svg fill="currentColor" class="w-6 h-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path x-cloak x-show="navBar" fill-rule="evenodd" clip-rule="evenodd"
                            d="M18.278 16.864a1 1 0 01-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 01-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 011.414-1.414l4.829 4.828 4.828-4.828a1 1 0 111.414 1.414l-4.828 4.829 4.828 4.828z">
                        </path>
                        <path x-show="!navBar" fill-rule="evenodd"
                            d="M4 5h16a1 1 0 010 2H4a1 1 0 110-2zm0 6h16a1 1 0 010 2H4a1 1 0 010-2zm0 6h16a1 1 0 010 2H4a1 1 0 010-2z">
                        </path>
                    </svg>
                </button>

            </div>
        </div>

        <div class="w-1/2">
            @livewire('ecommerce.nav-pesquisa')
        </div>

        <div class="flex items-start gap-5">
            <!-- Theme toggler -->
            <li class="hidden lg:flex">
                <button class="focus:outline-none focus:shadow-outline-purple" onclick="window.location.reload(true);"
                    @click="isDarkMode = !isDarkMode" aria-label="Toggle color mode">
                    <template x-if="!isDarkMode">
                        <svg class="w-6 h-6 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="currentColor">
                            <path
                                d="M12 18C8.68629 18 6 15.3137 6 12C6 8.68629 8.68629 6 12 6C15.3137 6 18 8.68629 18 12C18 15.3137 15.3137 18 12 18ZM12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16ZM11 1H13V4H11V1ZM11 20H13V23H11V20ZM3.51472 4.92893L4.92893 3.51472L7.05025 5.63604L5.63604 7.05025L3.51472 4.92893ZM16.9497 18.364L18.364 16.9497L20.4853 19.0711L19.0711 20.4853L16.9497 18.364ZM19.0711 3.51472L20.4853 4.92893L18.364 7.05025L16.9497 5.63604L19.0711 3.51472ZM5.63604 16.9497L7.05025 18.364L4.92893 20.4853L3.51472 19.0711L5.63604 16.9497ZM23 11V13H20V11H23ZM4 11V13H1V11H4Z">
                            </path>
                        </svg>
                    </template>
                    <template x-if="isDarkMode">
                        <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="currentColor">
                            <path
                                d="M10 7C10 10.866 13.134 14 17 14C18.9584 14 20.729 13.1957 21.9995 11.8995C22 11.933 22 11.9665 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C12.0335 2 12.067 2 12.1005 2.00049C10.8043 3.27098 10 5.04157 10 7ZM4 12C4 16.4183 7.58172 20 12 20C15.0583 20 17.7158 18.2839 19.062 15.7621C18.3945 15.9187 17.7035 16 17 16C12.0294 16 8 11.9706 8 7C8 6.29648 8.08133 5.60547 8.2379 4.938C5.71611 6.28423 4 8.9417 4 12Z">
                            </path>
                        </svg>
                    </template>
                </button>
            </li>

            <div class="hidden lg:flex items-center gap-4">

                @if (Auth::guard('web')->check())
                    <a href="" class="text-blue-300">
                        <svg class="size-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM7 12C7 14.7614 9.23858 17 12 17C14.7614 17 17 14.7614 17 12H15C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12H7Z">
                            </path>
                        </svg>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-gray-500">
                        <svg class="size-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM7 12H9C9 13.6569 10.3431 15 12 15C13.6569 15 15 13.6569 15 12H17C17 14.7614 14.7614 17 12 17C9.23858 17 7 14.7614 7 12Z">
                            </path>
                        </svg>
                    </a>
                @endif

                <button class="text-gray-500">
                    <svg class="size-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M4.00436 6.41686L0.761719 3.17422L2.17593 1.76001L5.41857 5.00265H20.6603C21.2126 5.00265 21.6603 5.45037 21.6603 6.00265C21.6603 6.09997 21.6461 6.19678 21.6182 6.29L19.2182 14.29C19.0913 14.713 18.7019 15.0027 18.2603 15.0027H6.00436V17.0027H17.0044V19.0027H5.00436C4.45207 19.0027 4.00436 18.5549 4.00436 18.0027V6.41686ZM5.50436 23.0027C4.67593 23.0027 4.00436 22.3311 4.00436 21.5027C4.00436 20.6742 4.67593 20.0027 5.50436 20.0027C6.33279 20.0027 7.00436 20.6742 7.00436 21.5027C7.00436 22.3311 6.33279 23.0027 5.50436 23.0027ZM17.5044 23.0027C16.6759 23.0027 16.0044 22.3311 16.0044 21.5027C16.0044 20.6742 16.6759 20.0027 17.5044 20.0027C18.3328 20.0027 19.0044 20.6742 19.0044 21.5027C19.0044 22.3311 18.3328 23.0027 17.5044 23.0027Z">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <nav class="hidden w-full lg:w-auto mt-1 lg:flex lg:mt-0 bg-gray-200 dark:bg-gray-700 justify-center"
        :class="{ 'fixed mt-20 px-6 ': navBar, 'hidden': !navBar }" x-transition>
        <ul class="flex flex-col lg:flex-row lg:gap-3 py-1"
            :class="{
                'bg-gray-100 text-gray-600 font-semibold text-sm uppercase tracking-widest p-4 rounded-md dark:text-white': navBar,
                'font-bold text-sm uppercase tracking-widest text-gray-500 dark:text-gray-100':
                    !navBar
            }">
            <li class="">
                <a href="/"
                    class="flex lg:px-3 py-2 u hover:text-orange-600 hover:underline underline-offset-8 decoration-2 delay-75">
                    Inicio
                </a>
            </li>

            <li class="">
                <a href="/#funcionalidades"
                    class="flex lg:px-3 py-2 hover:text-orange-600 hover:underline underline-offset-8 decoration-2 delay-75">
                    Funcionalidades
                </a>
            </li>

            <li class="">
                <a href=""
                    class="flex lg:px-3 py-2 hover:text-orange-600 hover:underline underline-offset-8 decoration-2 delay-75">
                    Blog
                </a>
            </li>

            <li class="">
                <a href=""
                    class="flex lg:px-3 py-2 hover:text-orange-600 hover:underline underline-offset-8 decoration-2 delay-75">
                    Contato
                </a>
            </li>

            <li class="flex lg:hidden justify-center items-center gap-4 mt-5">
                <div>
                    <a href="https://api.whatsapp.com/send?phone=558532235533&text=" target="_blank"
                        class="font-semibold text-white bg-orange-400 border border-orange-400 p-2 rounded-full transition-all">
                        Quero ser Rica
                    </a>
                </div>
            </li>
        </ul>
    </nav>

</header>
