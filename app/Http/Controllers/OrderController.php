<?php

namespace App\Http\Controllers;

use App\Entities\Order;
use App\Http\Requests\Orders\CreateOrderFormRequest;
use App\Http\Requests\Orders\UpdateOrderFormRequest;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Services\BrowseOrders\GetAllOrdersHandler;
use App\Services\CreateOrder\CreateOrderHandler;
use App\Services\CreateOrder\CreateOrderItemRequest;
use App\Services\CreateOrder\CreateOrderRequest;
use App\Services\GetOrder\GetOrderHandler;
use App\Services\RemoveOrder\RemoveOrderHandler;
use App\Services\UpdateOrder\UpdateOrderHandler;
use App\Services\UpdateOrder\UpdateOrderItemRequest;
use App\Services\UpdateOrder\UpdateOrderRequest;
use Carbon\Carbon;

class OrderController extends Controller
{
    private $updateOrderHandler;
    private $getAllOrdersHandler;
    private $getOrderHandler;
    private $createOrderHandler;
    private $removeOrderHandler;

    public function __construct(
        UpdateOrderHandler $updateOrderHandler,
        CreateOrderHandler $createCustomerHandler,
        GetAllOrdersHandler $getAllOrdersHandler,
        GetOrderHandler $getOrderHandler,
        RemoveOrderHandler $removeOrderHandler
    )
    {
        $this->updateOrderHandler = $updateOrderHandler;
        $this->createOrderHandler = $createCustomerHandler;
        $this->getOrderHandler = $getOrderHandler;
        $this->getAllOrdersHandler = $getAllOrdersHandler;
        $this->removeOrderHandler = $removeOrderHandler;
    }

    public function getOrder($id){
        $order = $this->getOrderHandler->handle($id);

        if ($order)
            return response(new OrderResource($order),200);

        return response('Order not found.',404);
    }

    public function getAllOrders(){

        $orders = $this->getAllOrdersHandler->handle();

        return response(new OrderCollection($orders),200);
    }

    public function create(CreateOrderFormRequest $request){

        $requestDto = new CreateOrderRequest();
        $requestDto->setCustomerId($request->customer_id);
        $requestDto->setOrderDate(Carbon::now());

        foreach ($request->items as $item){
            $orderItemRequestDto = new CreateOrderItemRequest();
            $orderItemRequestDto->setProductId($item['product_id']);
            $orderItemRequestDto->setQuantity($item['quantity']);

            $requestDto->setOrderItems($orderItemRequestDto);
        }

        $order = $this->createOrderHandler->handle($requestDto);

        return response(new OrderResource($order),201);

    }

    public function update(UpdateOrderFormRequest $request, $id){

        $requestDto = new UpdateOrderRequest();
        $requestDto->setCustomerId($request->customer_id);
        $requestDto->setOrderId($id);

        foreach ($request->items as $item){

            $orderItemRequestDto = new UpdateOrderItemRequest();
            $orderItemRequestDto->setOrderItemId($item['order_item_id']);
            $orderItemRequestDto->setProductId($item['product_id']);
            $orderItemRequestDto->setQuantity($item['quantity']);

            $requestDto->setOrderItems($orderItemRequestDto);
        }

        $order = $this->updateOrderHandler->handle($requestDto);

        return response([new OrderResource($order),'message' => 'Order successfully updated'],200);
    }

    public function remove($id){
        $this->removeOrderHandler->handle($id);

       return response('Order successfully deleted',200);
    }

}
