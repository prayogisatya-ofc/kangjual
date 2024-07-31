<?php

namespace App\Http\Controllers;

use App\Mail\InvoiceMail;
use App\Models\Product;
use App\Models\Transaction;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProductController extends Controller
{
    public function indexProject()
    {
        $projectProducts = Product::where('is_published', true)->where('type', 'project')->orderBy('created_at', 'desc')->get();

        return view('project', [
            'title' => 'Project',
            'projectProducts' => $projectProducts
        ]);
    }

    public function indexTemplate()
    {
        $templateProducts = Product::where('is_published', true)->where('type', 'template')->orderBy('created_at', 'desc')->get();

        return view('template', [
            'title' => 'Template',
            'templateProducts' => $templateProducts
        ]);
    }

    public function show($product)
    {
        $prod = Product::where('slug', $product)->where('is_published', true)->get()->firstOrFail();

        return view('show', [
            'title' => $prod->title,
            'product' => $prod,
        ]);
    }

    public function checkout($product)
    {
        $prod = Product::where('slug', $product)->where('is_published', true)->get()->firstOrFail();

        return view('checkout', [
            'title' => 'Checkout',
            'product' => $prod,
        ]);
    }

    public function store(Request $request, $product)
    {
        $buyer_name = $request->input('buyer_name');
        $email = $request->input('email');
        $reason = $request->input('reason');

        $invoice = mt_rand(10000000, 99999999);

        $transaction = Transaction::create([
            'invoice' => $invoice,
            'product_id' => $product,
            'down_avail' => 2,
            'status' => 'pending',
            'buyer_name' => $buyer_name,
            'email' => $email,
            'reason' => $reason
        ]);

        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('midtrans.isProduction');
        \Midtrans\Config::$isSanitized = config('midtrans.isSanitized');
        \Midtrans\Config::$is3ds = config('midtrans.is3ds');

        $params = array(
            'transaction_details' => array(
                'order_id' => $invoice,
                'gross_amount' => $transaction->product->price,
            ),
            'customer_details' => array(
                'first_name' => $buyer_name,
                'email' => $email,
            ),
            'item_details' => array(
                array(
                    'id' => $product,
                    'price' => $transaction->product->price,
                    'quantity' => 1,
                    'name' => $transaction->product->title
                )
            )
        );
        
        $paymentUrl = \Midtrans\Snap::createTransaction($params)->redirect_url;
        $transaction->redirect_url = $paymentUrl;
        $transaction->save();
        
        return redirect()->route('cek_invoice_view', ['order_id' => $transaction->invoice]);
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.serverKey');
        $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed != $request->signature_key) {
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        $transaction = Transaction::where('invoice', $request->order_id)->get()->first();

        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
            $transaction->status = 'payed';
            $transaction->save();
        } elseif ($request->transaction_status == 'deny' || $request->transaction_status == 'expire' || $request->transaction_status == 'cancel') {
            $transaction->status = 'canceled';
            $transaction->save();
        }

        return response()->json(['message' => 'Unhandled transaction status'], 400);
    }
}
