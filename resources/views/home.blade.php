@extends('layout')

@section('title')
    Kang Jual - {{ $title }}
@endsection

@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl xl:px-0 px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-14 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7 lg:order-1 order-2">
                <p class="text-primary-500 font-semibold lg:text-xl md:text-lg text-center lg:text-left mb-4">Hai kang
                    koders,</p>
                <h1
                    class="max-w-2xl mb-6 text-center lg:text-left text-4xl font-extrabold leading-none md:text-5xl xl:text-6xl dark:text-white">
                    Nyari <span class="text-primary-500">source code</span> tapi <span
                        class="underline decoration-primary-500">bingung?</span></h1>
                <p
                    class="max-w-2xl mb-6 text-center lg:text-left font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-500">
                    Temukan solusi aplikasi dan website yang siap pakai, dirancang untuk mempercepat pengembangan dan
                    meningkatkan produktivitas mu.</p>
                <div class="flex flex-col space-y-4 sm:flex-row justify-center lg:justify-start sm:space-y-0 sm:space-x-4">
                    <a href="{{ route('project_view') }}"
                        class="inline-flex items-center justify-center px-6 py-3 mr-0 xl:mr-3 text-base font-medium text-center text-white rounded-full bg-primary-500 hover:bg-primary-600 focus:ring focus:ring-primary-400 dark:focus:ring-primary-900">
                        Dapatkan
                        <svg class="w-5 h-5 ml-2 -mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="lg:mt-0 lg:col-span-5 lg:order-2 order-1">
                <lottie-player src="{{ asset('img/hero.json') }}" background="##fff" speed="1" loop autoplay
                    direction="1" mode="normal"></lottie-player>
            </div>
        </div>
    </section>
    <section class="bg-white dark:bg-gray-900">
        <div class="max-w-screen-xl xl:px-0 px-4 py-16 mx-auto">
            <div class="max-w-screen-md mb-8 lg:mb-16 mx-auto">
                <h2 class="mb-4 text-4xl text-center tracking-tight font-extrabold text-gray-900 dark:text-white">Source
                    Code <span class="text-primary-500">Terbaru</span></h2>
                <p class="text-gray-500 font-light text-center sm:text-xl dark:text-gray-400">Jelajahi koleksi terbaru kami
                    yang dirancang untuk memenuhi kebutuhan berbagai proyek. Siap membantu kamu mencapai hasil terbaik dalam
                    pengembangan aplikasi dan website mu.</p>
            </div>
            <div class="mb-4 grid gap-8 sm:grid-cols-2 md:mb-8 lg:grid-cols-3">
                @foreach ($latestProducts as $product)
                <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <div class="w-full">
                        <a href="{{ route('product_show', $product->slug) }}">
                            <img class="mx-auto w-full rounded-lg" src="{{ asset('storage/' . $product->thumbnail) }}" alt="" />
                        </a>
                    </div>
                    <div class="pt-6">
                        <div class="mb-4 flex items-center gap-2">
                            @if ($product->is_free)
                            <span class="rounded-full bg-primary-500 px-3 py-1.5 text-xs text-white">
                                Gratis
                            </span>
                            @endif
                            <span class="flex rounded-full items-center px-3 py-1.5 text-xs text-white" style="background-color: {{ $product->category->color }}">
                                <img src="{{ asset('storage/' . $product->category->icon) }}" class="rounded-full w-3.5 h-3.5 -ms-1 me-1.5" alt="{{ $product->category->title }}">
                                {{ $product->category->title }}
                            </span>
                        </div>

                        <a href="{{ route('product_show', $product->slug) }}" class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">
                            {{ $product->title }}
                        </a>

                        <div class="mt-2 pt-2 flex items-center justify-between gap-4 border-t-[1px] border-gray-200 dark:border-gray-600">
                            <p class="text-2xl font-bold leading-tight text-gray-900 dark:text-white">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            <div class="flex items-center gap-2">
                                <div class="flex items-center">
                                    <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                    </svg>
    
                                    <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                    </svg>
    
                                    <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                    </svg>
    
                                    <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                    </svg>
    
                                    <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                    </svg>
                                </div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">({{ $product->transactions->count() }})</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="bg-white px-4 py-8 antialiased dark:bg-gray-900 md:py-16">
        <div class="mx-auto grid max-w-screen-xl rounded-lg bg-gray-50 p-4 dark:bg-gray-800 md:p-8 lg:grid-cols-12 lg:gap-8 lg:p-16 xl:gap-16">
          <div class="lg:col-span-5 lg:mt-0">
            <a href="#">
                <lottie-player src="{{ asset('img/support.json') }}" background="##fff" speed="1" loop autoplay
                direction="1" mode="normal"></lottie-player>
            </a>
          </div>
          <div class="me-auto place-self-center lg:col-span-7">
            <h1 class="mb-3 text-2xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white md:text-4xl">
              Kamu bingung atau punya pertanyaan terkait source code?
            </h1>
            <p class="mb-6 text-gray-500 dark:text-gray-400 font-light">Kami di Kang Jual siap membantu kamu dengan pertanyaan atau masalah apa pun yang kamu hadapi. Apakah kamu memerlukan bantuan teknis, panduan untuk memilih source code yang tepat, atau informasi mengenai proses transaksi?</p>
            <a href="https://wa.me/6285158117703?text=Haloo+min+saya+butuh+bantuan" class="inline-flex items-center justify-center rounded-full bg-primary-500 px-5 py-3 text-center text-base font-medium text-white hover:bg-primary-600 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                Hubungi kami
                <svg class="w-5 h-5 ml-2 -mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M12 5a7 7 0 0 0-7 7v1.17c.313-.11.65-.17 1-.17h2a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1H6a3 3 0 0 1-3-3v-6a9 9 0 0 1 18 0v6a3 3 0 0 1-3 3h-2a1 1 0 0 1-1-1v-6a1 1 0 0 1 1-1h2c.35 0 .687.06 1 .17V12a7 7 0 0 0-7-7Z" clip-rule="evenodd"/>
                </svg>                  
            </a>
          </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
@endsection
