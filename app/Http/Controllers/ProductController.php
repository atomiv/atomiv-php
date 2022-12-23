<?php

namespace App\Http\Controllers;


use App\Http\Requests\Products\CreateProductFormRequest;
use App\Http\Requests\Products\UpdateProductFormRequest;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Services\BrowseProducts\GetAllProductsHandler;
use App\Services\CreateProduct\CreateProductHandler;
use App\Services\CreateProduct\CreateProductRequest;
use App\Services\GetProduct\GetProductHandler;
use App\Services\RemoveProduct\RemoveProductHandler;
use App\Services\UpdateProduct\UpdateProductHandler;
use App\Services\UpdateProduct\UpdateProductRequest;

class ProductController extends Controller
{
    private $updateProductHandler;
    private $createProductHandler;
    private $getProductHandler;
    private $getAllProductsHandler;
    private $removeProductHandler;

    public function __construct(
        UpdateProductHandler $updateProductHandler,
        CreateProductHandler $createProductHandler,
        GetProductHandler $getProductHandler,
        GetAllProductsHandler $getAllProductsHandler,
        RemoveProductHandler $removeProductHandler
    ){
        $this->createProductHandler = $createProductHandler;
        $this->updateProductHandler = $updateProductHandler;
        $this->removeProductHandler = $removeProductHandler;
        $this->getProductHandler = $getProductHandler;
        $this->getAllProductsHandler = $getAllProductsHandler;
    }

    public function getProduct($id){

        $product = $this->getProductHandler->handle($id);

        if ($product)
            return response(new ProductResource($product),200);

        return response('Product not found.',404);
    }

    public function getAllProducts(){

        $products = $this->getAllProductsHandler->handle();

        return response(new ProductCollection($products),200);
    }

    public function create(CreateProductFormRequest $request){

        $requestDto = new CreateProductRequest();
        $requestDto->setCode($request->code);
        $requestDto->setDescription($request->description);
        $requestDto->setUnitPrice($request->unit_price);

        $product = $this->createProductHandler->handle($requestDto);

        return response(new ProductResource($product),201);
    }

    public function update(UpdateProductFormRequest $request, $id){

        $requestDto = new UpdateProductRequest();
        $requestDto->setCode($request->code);
        $requestDto->setDescription($request->description);
        $requestDto->setUnitPrice($request->unit_price);

        $product = $this->updateProductHandler->handle($requestDto,$id);

        return response([new ProductResource($product),'message' =>'Product successfully updated'],200);
    }

    public function delete($id){
        $this->removeProductHandler->handle($id);

        return response('Product successfully deleted',200);
    }
}
