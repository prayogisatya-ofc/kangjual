@extends('layout')

@section('title')
    {{ $title }}
@endsection

@section('content')
<section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
      <div class="mx-auto">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Checkout</h2>
  
        <div class="mt-6 sm:mt-8 lg:flex lg:items-start lg:gap-12">
          <form method="POST" action="{{ route('product_store', $product->id) }}" class="w-full rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6 lg:max-w-xl lg:p-8">
            @csrf
            <div class="mb-6 grid grid-cols-2 gap-4">
              <div class="col-span-2 sm:col-span-1">
                <label for="full_name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                <input type="text" id="full_name" name="buyer_name" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="Jhon Doe" required />
              </div>
  
              <div class="col-span-2 sm:col-span-1">
                <label for="email" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Alamat Email</label>
                <input type="email" id="email" name="email" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 pe-10 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500  dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="jhondoe@kangjual.com" required />
              </div>

              <div class="col-span-2">
                <label for="reason" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Alasan Beli</label>
                  <textarea name="reason" id="reason" rows="5" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="Kosongkan jika tidak ingin mengisi..."></textarea>
              </div>
            </div>
  
            <button type="submit" class="flex w-full items-center justify-center rounded-lg bg-primary-500 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-600 focus:outline-none focus:ring-4  focus:ring-primary-300">Bayar Sekarang</button>
          </form>
  
          <div class="mt-6 grow sm:mt-8 lg:mt-0">
            <div class="space-y-4 rounded-lg border border-gray-100 bg-gray-50 p-6 dark:border-gray-700 dark:bg-gray-800">
              <div class="space-y-2">
                <dl class="flex items-center justify-between gap-4">
                  <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Nama Produk</dt>
                  <dd class="text-base font-medium text-gray-900 dark:text-white text-end">{{ $product->title }}</dd>
                </dl>
  
                <dl class="flex items-center justify-between gap-4">
                  <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Jenis Produk</dt>
                  <dd class="text-base font-medium text-gray-900 dark:text-white capitalize">{{ $product->type }}</dd>
                </dl>
  
                <dl class="flex items-center justify-between gap-4">
                  <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Framework</dt>
                  <dd class="text-base font-medium text-gray-900 dark:text-white">{{ $product->category->title }}</dd>
                </dl>

                <dl class="flex items-center justify-between gap-4">
                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Harga Produk</dt>
                    <dd class="text-base font-medium text-primary-500">Rp {{ number_format($product->price, 0, ',', '.') }}</dd>
                </dl>
              </div>
              
  
              <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                <dd class="text-base font-bold text-gray-900 dark:text-white">Rp {{ number_format($product->price, 0, ',', '.') }}</dd>
              </dl>
            </div>
  
            <div class="mt-6 flex items-center justify-center gap-8">
              <img class="h-8 w-auto" src="{{ asset('img/midtrans.svg') }}" alt="Midtrans" />
            </div>
          </div>
        </div>
  
        <p class="mt-6 text-center text-gray-500 dark:text-gray-400 sm:mt-8 lg:text-left">
          Pastikan alamat email kamu benar ya, karena informasi transaksi akan dikirimkan ke email kamu. Proses pembayaran dilakukan dengan <a href="https://midtrans.com/" title="" class="font-medium text-primary-500 underline hover:no-underline dark:text-primary-500">Midtrans</a> untuk produk ini.
        </p>
      </div>
    </div>
  </section>
@endsection