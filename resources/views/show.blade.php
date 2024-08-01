@extends('layout')

@section('image', asset(env('APP_URL').'/storage/'.$product->thumbnail))

@section('title')
    {{ $title }} - Kang Jual
@endsection

@section('content')
    <section class="py-8 bg-white md:py-16 dark:bg-gray-900 antialiased">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
            <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
                <div class="shrink-0 max-w-md lg:max-w-lg mx-auto">
                    <img class="w-full rounded-lg" id="main-image" src="{{ asset('storage/'.$product->thumbnail) }}" alt="{{ $product->title }}" />
                    <div class="mt-4 grid grid-cols-4 gap-4">
                        <img src="{{ asset('storage/'.$product->thumbnail) }}" class="thumbnail w-full object-cover rounded-lg cursor-pointer ring ring-transparent" onclick="changeMainImage('/storage/{{ $product->thumbnail }}')">
                        @foreach ($product->gallery as $gallery)
                            <img src="{{ asset('storage/'.$gallery) }}" class="thumbnail w-full object-cover rounded-lg cursor-pointer ring ring-transparent" onclick="changeMainImage('/storage/{{ $gallery }}')">
                        @endforeach
                    </div>
                </div>

                <div class="mt-6 sm:mt-8 lg:mt-0">
                    <div class="mb-4 flex items-center gap-2">
                        @if ($product->is_free)
                        <span class="rounded-full bg-primary-500 px-4 py-1.5 text-sm text-white">
                            Gratis
                        </span>
                        @endif
                        <span class="flex rounded-full items-center px-4 py-1.5 text-sm text-white" style="background-color: {{ $product->category->color }}">
                            <img src="{{ asset('storage/' . $product->category->icon) }}" class="rounded-full w-5 h-5 -ms-2 me-1.5" alt="{{ $product->category->title }}">
                            {{ $product->category->title }}
                        </span>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                        {{ $product->title }}
                    </h1>
                    <div class="mt-4 items-center gap-4 flex">
                        <p class="text-2xl font-bold text-gray-900 sm:text-3xl dark:text-white">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </p>

                        <div class="flex items-center gap-2">
                            <div class="flex items-center gap-1">
                                <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                                </svg>
                            </div>
                            <p class="text-sm font-medium leading-none text-gray-500 dark:text-gray-400">
                                ({{ $product->transactions->count() }})
                            </p>
                        </div>
                    </div>

                    <p class="mt-6 sm:text-lg font-light text-gray-500 dark:text-gray-400">
                        {{ $product->excerpt }}
                    </p>

                    <div class="mt-6 sm:gap-4 sm:items-center sm:flex">
                        @if ($product->is_free)
                        <form action="{{ route('download_file_free_handler', $product->slug) }}" method="get">
                            <button class="text-white bg-primary-500 hover:bg-primary-600 focus:ring-4 focus:ring-primary-300 font-medium rounded-full text-base px-8 py-3 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800 flex items-center justify-center" role="button">
                                <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 15v2a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-2m-8 1V4m0 12-4-4m4 4 4-4"/>
                                </svg>                              
                                Download
                            </button> 
                        </form>
                        @else
                        <a href="{{ route('product_checkout', $product->slug) }}" class="text-white bg-primary-500 hover:bg-primary-600 focus:ring-4 focus:ring-primary-300 font-medium rounded-full text-base px-8 py-3 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800 flex items-center justify-center" role="button">
                            <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 15v2a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-2m-8 1V4m0 12-4-4m4 4 4-4"/>
                            </svg>                              
                            Dapatkan
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="mt-16">
                <h3 class="text-2xl font-semibold mb-4 dark:text-white">Deskripsi</h3>
                <div class="text-gray-500 dark:text-gray-400 rich-text-content sm:text-md">
                    {!! $product->description !!}
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        function changeMainImage(imagePath) {
            document.getElementById('main-image').src = imagePath;
            
            let thumbnails = document.querySelectorAll('.thumbnail');
            thumbnails.forEach(thumb => {
                thumb.classList.remove('ring-primary-500')
                thumb.classList.add('ring-transparent')
            });
            event.target.classList.add('ring-primary-500');
            event.target.classList.remove('ring-transparent');
        }
    </script>
@endsection