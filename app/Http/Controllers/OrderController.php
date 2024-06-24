<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $isSearch = $request->filled('search');
        $isStatus = $request->filled('status');

        if ($isSearch || $isStatus) {
            $status = $request->input('status');
            $search = $request->input('search');

            $order = Order::where(
                function ($query) use ($isSearch, $isStatus, $search, $status) {
                    if ($isStatus) {
                        $query->where('status', $status);
                    }
                    if ($isSearch) {
                        $query->where('id', $search)->orWhere('address', 'like', "%".$search."%");
                    }
                    return $query;
                }
            );
            
            return $order->orderBy('id', 'desc')->get();
        }
        
        return Order::orderBy('id', 'desc')->get();
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
        $order = Order::create($request->all());

        $order->products()->attach($request->products);

        $data = ["id" => $order->id];
        return json_encode($data);
    }

    private function format_show_response($order): Order
    {
        $calculated_total = 0.0;
        $calculated_sale_total = 0.0;

        foreach($order->products as $product) {
            $calculated_total = $calculated_total + $product->pivot->quantity * $product->price;
            $product->quantity = $product->pivot->quantity;
        }

        $order->total = $calculated_total;

        return $order;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::with("client", "paymentMethod", "products")->findOrFail($id);

        return $this->format_show_response($order);
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
        $order = Order::findOrFail($id);
        $order->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
    }
}
