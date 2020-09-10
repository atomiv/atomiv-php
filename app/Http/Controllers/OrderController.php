<?php

namespace App\Http\Controllers;

use App\Http\Repository\OrderRepository;
use App\Http\Requests\OrderCreateRequest;
use App\Http\Requests\OrderUpdateRequest;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\OrderItem;
use App\Order;

class OrderController extends Controller
{
    private $orderRepo;

    public function __construct(OrderRepository $orderRepo)
    {
        $this->orderRepo = $orderRepo;
    }

    public function getOrder($id){
        $order = $this->orderRepo->find($id);

        if ($order)
            return response(new OrderResource($order),200);

        return response('Order not found.',404);
    }

    public function getAllOrders(){

        $orders = $this->orderRepo->all();

        return response(new OrderCollection($orders),200);
    }

    public function create(OrderCreateRequest $request){

        $order = $this->orderRepo->save($request->all());

        if ($order)
            return response(['message' => 'Order successfully created','order' => new OrderResource($order)],201);

        return response('The order is not created',422);

    }

    public function update(OrderUpdateRequest $request,$id){

        $orderItems = $this->orderRepo->update($id,$request->all());

        if ($orderItems)
            return response('Order successfully updated',200);

        return response('The order is not updated',422);

    }

    public function delete($id){
       $order = $this->orderRepo->delete($id);

        if ($order)
            return response('Order successfully deleted',200);

        return response('The order is not deleted',409);
    }

}
