@extends('layout')

@section('title')
    {{ $title }} - Kang Jual
@endsection

@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="max-w-screen-xl xl:px-0 px-4 py-16 mx-auto">
            <div class="max-w-screen-md mb-8 lg:mb-16 mx-auto">
                <h2 class="mb-4 text-4xl text-center tracking-tight font-extrabold text-gray-900 dark:text-white">Template</h2>
                <p class="text-gray-500 font-light text-center sm:text-xl dark:text-gray-400">Kami menawarkan berbagai template menarik yang dapat digunakan sebagai dasar untuk proyek mu.</p>
            </div>
            <div class="mb-4 grid gap-8 sm:grid-cols-2 md:mb-8 lg:grid-cols-3">
                @forelse ($templateProducts as $product)
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
                @empty
                <div></div>
                <lottie-player src="{{ asset('img/empty.json') }}" background="##fff" speed="1" loop autoplay direction="1" mode="normal"></lottie-player>
                <div></div>
                @endforelse
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
@endsection