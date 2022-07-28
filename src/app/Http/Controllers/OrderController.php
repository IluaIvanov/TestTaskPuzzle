<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\OrderRequest as Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page = $request->query('page', 0);
        $limit =  $request->query('limit', 10);

        return getSuccess(['orders' => Order::skip($page * $limit)->take($limit)->get(['id', 'full_name', 'total_cost', 'address', 'created_at'])]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orders = Order::create($request->validated());

        return getSuccess(['order' => $orders], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($order)
    {
        $order = checkExistOrder($order);

        return getSuccess(['order' => $order]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $order)
    {
        $order = checkExistOrder($order);
        $order->fill($request->except(['order']));
        $order->save();
        return getSuccess(['order' => $order]);
    }
}
