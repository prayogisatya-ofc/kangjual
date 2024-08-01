@extends('layout')

@section('title')
    {{ $title }} - Kang Jual
@endsection

@section('content')
<section class="bg-white dark:bg-gray-900">
    <div class="max-w-screen-xl xl:px-0 px-4 py-16 mx-auto">
        <div class="max-w-screen-md mb-8 lg:mb-16 mx-auto">
            <h2 class="mb-4 text-4xl text-center tracking-tight font-extrabold text-gray-900 dark:text-white">Cek Invoice</h2>
            <p class="text-gray-500 font-light text-center sm:text-xl dark:text-gray-400">Cek invoice kamu untuk lihat status pembayaran dan juga download file source code yang kamu beli.</p>
            <form class="max-w-sm mx-auto mt-6 flex gap-3">
                <div class="relative w-full">
                  <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 8h6m-6 4h6m-6 4h6M6 3v18l2-2 2 2 2-2 2 2 2-2 2 2V3l-2 2-2-2-2 2-2-2-2 2-2-2Z"/>
                    </svg>                      
                  </div>
                  <input type="text" name="order_id" value="{{ $no }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-primary-500 focus:border-primary-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Contoh: 12345678">
                </div>
                <button type="submit" class="text-white bg-primary-500 hover:bg-primary-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-primary-500 dark:hover:bg-primary-600 dark:focus:ring-primary-800">Cek</button>
            </form>
        </div>
        @if ($transaction)
        <div class="mx-auto max-w-screen-md px-4 2xl:px-0">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl mb-2">Detail Transaksi Kamu</h2>
            <p class="text-gray-500 dark:text-gray-400 mb-6 md:mb-8">Kamu memesan dengan nomor invoice <span class="font-medium text-gray-900 dark:text-white">#{{ $transaction->invoice }}</span>. Kamu bisa cek transaksi dan lakukan pembayaran ini kapan saja, selagi masa aktif pembayaran masih berlaku. </p>
            <div class="space-y-4 rounded-lg border border-gray-100 bg-gray-50 p-6 dark:border-gray-700 dark:bg-gray-800 mb-4">
                <dl class="sm:flex items-center justify-between gap-4">
                    <dt class="font-normal mb-1 sm:mb-0 text-gray-500 dark:text-gray-400">Nama Pembeli</dt>
                    <dd class="font-medium text-gray-900 dark:text-white sm:text-end capitalize">{{ $transaction->buyer_name }}</dd>
                </dl>
                <dl class="sm:flex items-center justify-between gap-4">
                    <dt class="font-normal mb-1 sm:mb-0 text-gray-500 dark:text-gray-400">Alamat Email</dt>
                    <dd class="font-medium text-gray-900 dark:text-white sm:text-end">{{ $transaction->email }}</dd>
                </dl>
                <dl class="sm:flex items-center justify-between gap-4">
                    <dt class="font-normal mb-1 sm:mb-0 text-gray-500 dark:text-gray-400">Alasan Beli</dt>
                    <dd class="font-medium text-gray-900 dark:text-white sm:text-end">{{ $transaction->reason ?? '-' }}</dd>
                </dl>
            </div>
            <div class="space-y-4 rounded-lg border border-gray-100 bg-gray-50 p-6 dark:border-gray-700 dark:bg-gray-800 mb-6 md:mb-8">
                <dl class="sm:flex items-center justify-between gap-4">
                    <dt class="font-normal mb-1 sm:mb-0 text-gray-500 dark:text-gray-400">Nama Produk</dt>
                    <dd class="font-medium text-gray-900 dark:text-white sm:text-end">{{ $transaction->product->title }}</dd>
                </dl>
                <dl class="sm:flex items-center justify-between gap-4">
                    <dt class="font-normal mb-1 sm:mb-0 text-gray-500 dark:text-gray-400">Tipe Produk</dt>
                    <dd class="font-medium text-gray-900 dark:text-white sm:text-end capitalize">{{ $transaction->product->type }}</dd>
                </dl>
                <dl class="sm:flex items-center justify-between gap-4">
                    <dt class="font-normal mb-1 sm:mb-0 text-gray-500 dark:text-gray-400">Framework</dt>
                    <dd class="font-medium text-gray-900 dark:text-white sm:text-end">
                        <span class="inline-flex rounded-full items-center px-3 py-1.5 text-xs text-white" style="background-color: {{ $transaction->product->category->color }}">
                            <img src="{{ asset('storage/' . $transaction->product->category->icon) }}" class="rounded-full w-3.5 h-3.5 -ms-1 me-1.5" alt="{{ $transaction->product->category->title }}">
                            {{ $transaction->product->category->title }}
                        </span>
                    </dd>
                </dl>
                <dl class="sm:flex items-center justify-between gap-4">
                    <dt class="font-normal mb-1 sm:mb-0 text-gray-500 dark:text-gray-400">Total Bayar</dt>
                    <dd class="font-medium text-primary-500 sm:text-end">Rp {{ number_format($transaction->product->price, 0, ',', '.') }}</dd>
                </dl>
                <dl class="sm:flex items-center justify-between gap-4">
                    <dt class="font-normal mb-1 sm:mb-0 text-gray-500 dark:text-gray-400">Status Pembayaran</dt>
                    <dd class="font-medium text-gray-900 dark:text-white sm:text-end">
                        @if ($transaction->status == 'pending')
                        <span class="bg-amber-200 text-amber-800 text-xs font-medium inline-flex items-center px-2.5 py-1.5 rounded-full capitalize dark:bg-amber-900 dark:text-amber-400 border border-amber-500 ">
                            <svg class="w-4 h-4 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
                            </svg>
                            {{ $transaction->status }}
                        </span> 
                        @else
                            @if ($transaction->status == 'payed')
                            <span class="bg-primary-200 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-1.5 rounded-full capitalize dark:bg-primary-900 dark:text-primary-400 border border-primary-500 ">
                                <svg class="w-4 h-4 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
                                </svg>                                  
                                Paid
                            </span>
                            @else
                                @if ($transaction->status == 'canceled')
                                <span class="bg-red-200 text-red-800 text-xs font-medium inline-flex items-center px-2.5 py-1.5 rounded-full capitalize dark:bg-red-900 dark:text-red-400 border border-red-500 ">
                                    <svg class="w-4 h-4 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm7.707-3.707a1 1 0 0 0-1.414 1.414L10.586 12l-2.293 2.293a1 1 0 1 0 1.414 1.414L12 13.414l2.293 2.293a1 1 0 0 0 1.414-1.414L13.414 12l2.293-2.293a1 1 0 0 0-1.414-1.414L12 10.586 9.707 8.293Z" clip-rule="evenodd"/>
                                    </svg>                                                                    
                                    {{ $transaction->status }}
                                </span>
                                @endif
                            @endif
                        @endif
                    </dd>
                </dl>
                @if ($transaction->status == 'payed')
                <dl class="sm:flex items-center justify-between gap-4">
                    <dt class="font-normal mb-1 sm:mb-0 text-gray-500 dark:text-gray-400">Kuota Download</dt>
                    <dd class="font-medium text-gray-900 dark:text-white sm:text-end">{{ $transaction->down_avail }}x</dd>
                </dl>
                @endif
            </div>
            @if ($transaction->status == 'payed')
            <div class="flex items-center p-4 mb-4 -mt-2 md:-mt-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                  Matikan <span class="font-medium">Internet Download Manager (IDM)</span> kamu, supaya tidak gagal ketika download file ini!
                </div>
            </div>
            @endif
            @if ($errors->any())
            <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v5a1 1 0 1 0 2 0V8Zm-1 7a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H12Z" clip-rule="evenodd"/>
                </svg>                  
                <span class="sr-only">Info</span>
                <div>
                    {{ $errors->first('error') }}
                </div>
            </div>
            @endif
            <div class="flex items-center space-x-4">
                @if ($transaction->status == 'payed' && $transaction->down_avail > 0)
                <form action="{{ route('generate_download_token', $transaction->invoice) }}" method="get">
                    <button type="submit" class="inline-flex gap-2 items-center text-white bg-primary-500 hover:bg-primary-600 focus:ring-4 focus:ring-primary-300 font-medium rounded-full text-sm px-5 py-2.5 dark:bg-primary-500 dark:hover:bg-primary-600 focus:outline-none dark:focus:ring-primary-800">
                        <svg class="w-5 h-5 -ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M13 11.15V4a1 1 0 1 0-2 0v7.15L8.78 8.374a1 1 0 1 0-1.56 1.25l4 5a1 1 0 0 0 1.56 0l4-5a1 1 0 1 0-1.56-1.25L13 11.15Z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M9.657 15.874 7.358 13H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-2.358l-2.3 2.874a3 3 0 0 1-4.685 0ZM17 16a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z" clip-rule="evenodd"/>
                        </svg>                      
                        Download File
                    </button>
                </form>
                @endif
                @if ($transaction->status == 'pending')
                <form action="{{ $transaction->redirect_url }}" method="get">
                    <button type="submit" class="inline-flex gap-2 items-center text-white bg-primary-500 hover:bg-primary-600 focus:ring-4 focus:ring-primary-300 font-medium rounded-full text-sm px-5 py-2.5 dark:bg-primary-500 dark:hover:bg-primary-600 focus:outline-none dark:focus:ring-primary-800">
                        <svg class="w-5 h-5 -ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M7 6a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2h-2v-4a3 3 0 0 0-3-3H7V6Z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M2 11a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-7Zm7.5 1a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5Z" clip-rule="evenodd"/>
                            <path d="M10.5 14.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z"/>
                        </svg>                                   
                        Bayar Sekarang
                    </button>
                </form>
                <form action="{{ route('cek_invoice_canceled', $transaction->invoice) }}" method="get">
                    <button type="submit" onclick="return confirm('Beneran mau di cancel?')" class="py-2.5 px-5 text-sm font-medium text-red-500 focus:outline-none bg-red-200 rounded-full border border-red-500 hover:bg-red-300 focus:z-10 focus:ring-4 focus:ring-red-200 dark:focus:ring-red-900 dark:bg-red-900 dark:text-red-500 dark:border-red-500 dark:hover:bg-red-800">Cancel Pembayaran</button>
                </form>
                @endif
            </div>
        </div>
        @else
        <div class="mx-auto max-w-md px-4 2xl:px-0">
            <lottie-player src="{{ asset('img/invoice.json') }}" background="##fff" speed="1" loop autoplay direction="1" mode="normal"></lottie-player>
            @if ($errors->any())
            <p class="text-center text-red-800 dark:text-red-400">
                {{ $errors->first('error') }}
            </p>
            @endif
        </div>
        @endif
    </div>
</section>
@endsection

@section('script')
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
@endsection