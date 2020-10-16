<?php

namespace App\Http\Controllers;


use App\Http\Requests\Products\CreateProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;

class ProductController extends Controller
{
    private $productService;

    public function __construct(ProductService $productService){
        $this->productService = $productService;
    }

    public function getProduct($id){

        $product = $this->productService->getProduct($id);

        if ($product)
            return response(new ProductResource($product),200);

        return response('Product not found.',404);
    }

    public function getAllProducts(){

        $products = $this->productService->getAllProducts();

        return response(new ProductCollection($products),200);
    }

    public function create(CreateProductRequest $request){

        $product = $this->productService->save($request->all());

        if ($product)
            return response(new ProductResource($product),201);

        return response('The product is not created',422);
    }

    public function update(UpdateProductRequest $request, $id){

        $product = $this->productService->update($id,$request->all());

        if ($product)
            return response('Product successfully updated',200);

        return response('The product is not updated',422);
    }
    public function delete($id){
        $product = $this->productService->delete($id);

        if ($product)
            return response('Product successfully deleted',200);

        return response('Product is not deleted',409);
    }
}
