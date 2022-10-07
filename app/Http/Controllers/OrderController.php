<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order, Request $request)
    {
        if($order->user_id == $request->user()->id || $request->user()->isAdmin())
            return view('orders.show', ['order' => $order, 'products' => $order->products]);
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function makeOrder(Request $request, $id) {
        $validated = $request->validate([
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $product = Product::find($id);
        $order = new Order();
        $order->o_status = 1; // 0: payment state, 1:process state and wait for confirmation, 2: success state, 3:reject
        $order->o_type = 0;
        $order->o_placing_date = now();
        if (!$request->user()) {
            return redirect()->to('/login');
        }
        $order->user_id = $request->user()->id;
        $order->save();

        $product->p_quantity -= $request->input('quantity');
        $product->save();

        $product->orders()->save($order, ['op_quantity' => $request->input('quantity'), 'op_amount' => $request->input('quantity')*$product->p_price]);

        return redirect()->route('orders.show', ['order' => $order->id]);
    }

    public function cancelOrder(Request $request, Order $order) {
        if($request->user()->id == $order->user_id || $request->user()->isAdmin() && ($order->o_status == 0 || $order->o_status == 1)) {
            $order->o_status = 3;
            $order->save();
        }

        return redirect()->back();
    }

    public function finishOrder(Request $request, Order $order) {
        if($request->user()->isAdmin() && $order->o_status == 1) {
            $order->o_status = 2;
            $order->save();
        }

        return redirect()->back();
    }
}
