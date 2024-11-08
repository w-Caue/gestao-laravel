<div>
    <section class="content-block">
        {{-- <div class="grid mx-4 px-4 pt-20 pb-8 lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            <div class="mr-auto border-2 place-self-center lg:col-span-7">
                <p class="text-4xl font-bold tracking-tight text-purple-700">Sabor em Cada Mordida</p>
                <h1
                    class="max-w-2xl mb-4 text-gray-800 text-4xl font-extrabold leading-none tracking-tight md:text-4xl xl:text-6xl">
                    Pizzas e Hambúrgueres Irresistíveis <br></h1>
                <p class="max-w-2xl font-light text-gray-500 md:text-lg lg:text-xl">
                    Explore a delícia em nosso menu! Pizzas cheias de sabor e hambúrgueres suculentos - [Nome da
                    Lanchonete] é o paraíso para quem ama uma boa mordida. Ingredientes frescos, combinações únicas e
                    muita paixão. Venha saborear o melhor da cidade!
                </p>
            </div>
            <div class="hidden  lg:mt-0 lg:col-span-5 lg:flex">
                <img src="{{ asset('img/logo.png') }}" alt="imagem hamburguer">
            </div>
        </div> --}}
        <div class="flex items-center min-h-screen p-6 ">
            <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl">
                <div class="flex flex-col overflow-y-auto md:flex-row">
                    <div class="h-32 md:h-auto md:w-1/2">

                        <div class="flex flex-col items-center justify-center w-full h-full p-6 sm:p-6 ">
                            <div
                                class="text-4xl font-black text-center text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">
                                RICA INFORMÁTICA
                            </div>
                            <span class="font-semibold">Sistemas de gestão</span>
                        </div>
                    </div>
                    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                        <div class="w-full">
                            <h1 class="mb-4 text-xl font-semibold text-gray-700">
                                Faça seu login
                            </h1>
                            <div>
                                @livewire('auth.login')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
