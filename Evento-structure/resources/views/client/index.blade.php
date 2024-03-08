<x-client-layout>


    <section>
        <div class="flex flex-coll items-center justify-center">
            <div class=" mt-14 ">
                <h2 class="text-6xl font-bold " style="font-family:initial">
                    Moments become memories
                </h2>
            </div>
            <div class="mt-[5rem]">
                <p class="w-[250px] ml-7"
                    style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                    Register today and secure your seat at our invisitor event
                </p>
            </div>
        </div>
        <div class="flex flex-coll items-center justify-between">
            <div class="mt-4 ml-9 p-6 rounded-2xl"
                style=" background: rgb(255,255,255);
                 background: radial-gradient(circle, rgba(255,255,255,1) 0%, rgba(222,222,222,1) 100%); ">
                <div class="flex items-center justify-center flex-col ">
                    <div class="flex items-center justify-center space-x-1 mb-6">
                        <!-- Facebook icon -->
                        <a href="#"
                            class="text-white hover:text-gray-900 bg-black hover:bg-white rounded-full p-3"
                            target="_blank">
                            <i class="fab fa-facebook-square text-2xl"></i>
                        </a>

                        <!-- Instagram icon -->
                        <a href="#"
                            class="text-white hover:text-gray-900 bg-black hover:bg-white rounded-full p-3"
                            target="_blank">
                            <i class="fab fa-instagram text-2xl"></i>
                        </a>

                        <!-- WhatsApp icon -->
                        <a href="#"
                            class="text-white hover:text-gray-900 bg-black hover:bg-white rounded-full p-3"
                            target="_blank">
                            <i class="fab fa-whatsapp-square text-2xl"></i>
                        </a>
                    </div>

                    <p class="w-3/4 text-center font-bold"
                        style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                        Write to us for a consultation
                    </p>
                </div>
            </div>
            <div>
                <img src="{{ asset('assets/img/o (2).png') }}" class="w-[400px] mt-16" alt="">
                <div class="flex flex-coll justify-center ">
                    <p class=" cursor-pointer inline-block bg-black text-4xl px-4 py-2 rounded-full font-bold text-white hover:bg-gray-800 transition-colors duration-300">
                        sign-in
                    </p>
                    <span class="flex items-center justify-center bg-black rounded-full w-16 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="h-6 w-6 fill-current text-white ">
                            <path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z" />
                        </svg>
                    </span>
                </div>

            </div>

            <div class=" mt-14 w-2/3">
                <h2 class="text-6xl font-bold w-full" style="font-family:initial">
                    when shared together
                </h2>
            </div>

        </div>

    </section>


    {{-- <div class="relative overflow-hidden rounded-lg bg-cover bg-no-repeat p-12 text-center"
        style="background-image: url('{{ asset('assets/img/bg-3.jpg') }}'); height: 400px">
        <div class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed"
            style="background-color: rgba(0, 0, 0, 0.)">
            <div class="flex h-full items-center justify-center">
                <div class="text-white">
                    <h2 class="mb-4 text-4xl font-semibold">Heading</h2>
                    <h4 class="mb-6 text-xl font-semibold">Subheading</h4>
                    <button type="button"
                        class="rounded border-2 border-neutral-50 px-7 pb-[8px] pt-[10px] text-sm font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-100 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-neutral-100 focus:border-neutral-100 focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                        data-twe-ripple-init data-twe-ripple-color="light">
                        Call to action
                    </button>
                </div>
            </div>
        </div>
    </div> --}}


    {{-- <div>
        <div class="relative h-screen flex items-center justify-center">
            <!-- Image div -->
            <div class="absolute inset-0 flex items-center justify-center z-10">
                <img src="{{ asset('assets/img/michel.png') }}" alt="" class="w-[29rem] ">
            </div>

            <!-- Text div -->
            <div class="absolute z-20 flex items-center justify-center w-3/4">
                <h1 class="text-white font-bold text-7xl text-center" style="font-family: 'Caveat', cursive;">
                    Moments become memories when shared together
                </h1>
            </div>
        </div>


    </div> --}}

</x-client-layout>
