<?php

namespace App\Http\Controllers;

use App\Http\Requests\Orders\CreateOrderFormRequest;
use App\Http\Requests\Orders\UpdateOrderFormRequest;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Services\Dto\CreateOrderItemRequestDto;
use App\Services\Dto\CreateOrderRequestDto;
use App\Services\Dto\UpdateOrderItemRequestDto;
use App\Services\Dto\UpdateOrderRequestDto;
use App\Services\OrderService;
use Carbon\Carbon;

class OrderController extends Controller
{
    private $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;

    }

    public function getOrder($id){
        $order = $this->orderService->getOrder($id);

        if ($order)
            return response(new OrderResource($order),200);

        return response('Order not found.',404);
    }

    public function getAllOrders(){

        $orders = $this->orderService->getAllOrders();

        return response(new OrderCollection($orders),200);
    }

    public function create(CreateOrderFormRequest $request){

        $requestDto = new CreateOrderRequestDto();
        $requestDto->setCustomerId($request->customer_id);
        $requestDto->setOrderDate(Carbon::now());

        foreach ($request->items as $item){

            $orderItemRequestDto = new CreateOrderItemRequestDto();
            $orderItemRequestDto->setProductId($item['product_id']);
            $orderItemRequestDto->setQuantity($item['quantity']);

            $requestDto->setOrderItems($orderItemRequestDto);
        }

        $order = $this->orderService->insert($requestDto);

        if ($order)
            return response(new OrderResource($order),201);

        return response('The order is not created',422);

    }

    public function update(UpdateOrderFormRequest $request, $id){

        $requestDto = new UpdateOrderRequestDto();
        $requestDto->setCustomerId($request->customer_id);
        $requestDto->setOrderDate(Carbon::now());

        foreach ($request->items as $item){

            $orderItemRequestDto = new UpdateOrderItemRequestDto();
            $orderItemRequestDto->setOrderItemId($item['order_item_id']);
            $orderItemRequestDto->setProductId($item['product_id']);
            $orderItemRequestDto->setQuantity($item['quantity']);

            $requestDto->setOrderItems($orderItemRequestDto);
        }

        $order = $this->orderService->update($requestDto,$id);

        if ($order)
            return response(new OrderResource($order),200);

        return response('The order is not updated',422);

    }

    public function delete($id){
       $order = $this->orderService->delete($id);

        if ($order)
            return response('Order successfully deleted',200);

        return response('The order is not deleted',409);
    }

}
