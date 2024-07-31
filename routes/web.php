<?php

use App\Http\Controllers\CekInvoiceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home_view');
Route::get('/project', [ProductController::class, 'indexProject'])->name('project_view');
Route::get('/template', [ProductController::class, 'indexTemplate'])->name('template_view');

Route::get('/privacy-policy', function(){
    return view('privacypolicy', ['title' => 'Privacy Policy']);
})->name('privacy_policy_views');

Route::get('/terms-conditions', function(){
    return view('terms', ['title' => 'Terms & Cobditions']);
})->name('terms_views');

Route::get('/cek-invoice', [CekInvoiceController::class, 'index'])->name('cek_invoice_view');
Route::get('/cek-invoice/canceled/{invoice}', [CekInvoiceController::class, 'canceled'])->name('cek_invoice_canceled');

Route::get('/download/premium/{token}', [CekInvoiceController::class, 'downloadFile'])->name('download_file_handler');
Route::get('/download/free/{slug}', [CekInvoiceController::class, 'downloadFileFree'])->name('download_file_free_handler');
Route::get('/genetate-download-token/{invoice}', [CekInvoiceController::class, 'generateDownloadToken'])->name('generate_download_token');

Route::get('/checkout/{product}', [ProductController::class, 'checkout'])->name('product_checkout');
Route::post('/checkout/{product}/store', [ProductController::class, 'store'])->name('product_store');
Route::get('/{product}', [ProductController::class, 'show'])->name('product_show');

Route::post('/transaction/callback', [ProductController::class, 'callback'])->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);