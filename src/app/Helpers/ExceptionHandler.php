<?php

use App\Models\Order;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * A function that allows you to check for the existence
 * of an order and issue a readable error to
 * the user in case of its absence
 *
 * @param integer $orderId
 * @return \Illuminate\Http\Response or \App\Models\Order
 */

function checkExistOrder($orderId)
{
    try {
        $order = Order::findOrFail($orderId);
    }
    catch (ModelNotFoundException $e) {
        return getError('Order not found', 404)->send();
        exit;
    }

    return $order;
}
