<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Order;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function issueInvoice(Request $request, $id) {
        $order = Order::find($id);

        if($request->user() == null || $order->o_status != 2 || Invoice::where('order_id', $id)->count())
            return redirect()->back();

        $invoice = new Invoice();
        $invoice->order_id = $order->id;
        $invoice->user_id = $request->user()->id;
        $invoice->i_payment_method = "บัตรเครดิต";
        $invoice->i_paying_date = now();
        $invoice->i_placing_date = now();
        $invoice->save();

        return redirect()->back();
    }
}
