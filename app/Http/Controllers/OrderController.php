<?php

namespace App\Http\Controllers;
use Auth;
use App\Item;
use App\Wallet;
use App\Order;
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
        $id = Auth::user()->id;
        if(Auth::user()->roles == 'admin'){
            $orders = Order::all();
            $items = Item::all();
            $wallets = Wallet::all();
            return view('admin.pages.Order.orders', compact('orders','items','wallets'));
        }
        else{
            $orders = Order::where('customer_id', $id)->get();
            $items = Item::all();
            $wallets = Wallet::all();
            return view('admin.pages.Order.orders', compact('orders','items','wallets'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$items = Item::all();
        //$wallets = Wallet::all();
        //return view('admin.pages.Order.orders', compact('items','wallets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order;
        
        $order->item_name = $request->item_name;
        $order->customer_id = $request->customer_id;
        $order->address = $request->address;
        $order->methods = $request->methods;
        $order->bkash_trxid = $request->bkash_trxid;
        $order->nagad_trxid = $request->nagad_trxid;
        $order->quantity = $request->quantity;
        $order->total = $request->total;
        $order->status = $request->status;
        $order->save();

        return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        $items = Item::all();
        $wallets = Wallet::all();
        return view('admin.pages.Order.edit_order',compact('order','items','wallets'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::find($id);

        $order->item_name = $request->item_name;
        $order->customer_id = $request->customer_id;
        $order->address = $request->address;
        $order->methods = $request->methods;
        $order->bkash_trxid = $request->bkash_trxid;
        $order->nagad_trxid = $request->nagad_trxid;
        $order->quantity = $request->quantity;
        $order->total = $request->total;
        $order->status = $request->status;
        $order->save();
        

        return redirect(route('order.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        order::where('id',$id)->delete();
        return redirect()->back();
    }
}
