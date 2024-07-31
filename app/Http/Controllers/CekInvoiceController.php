<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CekInvoiceController extends Controller
{
    public function index(Request $request)
    {
        $no = $request->input('order_id');

        $transaction = null;

        if ($no) {
            if (Transaction::where('invoice', $no)->exists()) {
                $transaction = Transaction::where('invoice', $no)->firstOrFail();
            }
        }

        return view('cekinvoice', [
            'title' => 'Cek Invoice',
            'transaction' => $transaction,
            'no' => $no
        ]);
    }

    public function canceled($invoice)
    {
        $transaction = Transaction::where('invoice', $invoice)->where('status', 'pending');
        if ($transaction->exists()) {
            $transaction = $transaction->first();
            $transaction->status = 'canceled';
            $transaction->save();
            
            return redirect()->back();
        }

        return redirect()->route('cek_invoice_view')->withInput()->withErrors(['error' => 'Nggk ada transaksi dengan nomor invoice #'.$invoice.' ini atau status transaksi sudah dibayar!']);
    }

    public function generateDownloadToken($invoice)
    {
        $transaction = Transaction::where('invoice', $invoice)->first();

        if ($transaction && $transaction->down_avail > 0) {
            $transaction->download_token = Str::random(40);
            $transaction->save();

            $downloadLink = route('download_file_handler', ['token' => $transaction->download_token]);

            return redirect()->to($downloadLink);
        }
        return redirect()->back()->withInput()->withErrors(['error' => 'Kuota download kamu sudah habis buat transaksi ini!']);
    }

    public function downloadFile($token)
    {
        $transaction = Transaction::where('download_token', $token)->first();

        if ($transaction && $transaction->down_avail > 0) {
            $filePath = 'private/' . $transaction->product->file;

            if (Storage::disk('private')->exists($transaction->product->file)) {
                $transaction->download_token = null;
                $transaction->down_avail -= 1;
                $transaction->save();
    
                $newFileName = $transaction->invoice . '-' . $transaction->product->slug . '.zip';

                return Storage::download($filePath, $newFileName);
            }
            return redirect()->back()->withInput()->withErrors(['error' => 'File error coba tanya admin!']);
        }
        return redirect()->back()->withInput()->withErrors(['error' => 'Kuota download kamu sudah habis buat transaksi ini!']);
    }

    public function downloadFileFree($slug)
    {
        $product = Product::where('slug', $slug)->first();

        if ($product && $product->is_free) {
            $filePath = 'private/' . $product->file;

            if (Storage::disk('private')->exists($product->file)) {    
                $newFileName = $product->slug . '.zip';
                return Storage::download($filePath, $newFileName);
            }
            return redirect()->back();
        }
        return redirect()->back();
    }
}
