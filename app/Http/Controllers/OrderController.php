<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderCreateRequest;
use App\Http\Requests\OrderUpdateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\OrderItem;
use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function getOrder($id){
        $order = Order::with('orderItems')->where('id',$id)->get();

        if ($order)
            return response($order,200);

        return response('Order not found.',404);
    }

    public function getAllOrders(){

        $orders = Order::with('orderItems')->get();

        return response($orders,200);
    }

    public function create(OrderCreateRequest $request){

        $order = Order::create(['customer_id'=>$request->input('customer_id')]);

        foreach ($request->items as $item){
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'product_price' => $item['product_price'],
                'product_code' => $item['product_code'],
                'quantity' => $item['quantity'],
            ]);
        }

        if ($order)
            return response('Order successfuly created',201);

        return response('The order is not created',422);

    }

    public function update(OrderUpdateRequest $request,$id){

        $orderItems = OrderItem::where('id',$id)->update($request->all());

        if ($orderItems)
            return response('Order successfully updated',200);

        return response('The order is not updated',422);

    }

    public function delete($id){
        $order = Order::destroy($id);
        $order_items = OrderItem::where('order_id',$id)->delete();


        if ($order)
            return response('Order successfully deleted',200);

        return response('The order is not deleted',409);
    }

}
