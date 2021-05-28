<?php

namespace App\Http\Controllers;


use App\Http\Requests\Products\CreateProductFormRequest;
use App\Http\Requests\Products\UpdateProductFormRequest;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Services\Dto\CreateProductRequestDto;
use App\Services\Dto\UpdateProductRequestDto;
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

    public function create(CreateProductFormRequest $request){

        $requestDto = new CreateProductRequestDto();
        $requestDto->setCode($request->code);
        $requestDto->setDescription($request->description);
        $requestDto->setUnitPrice($request->unit_price);

        $product = $this->productService->insert($requestDto);

        if ($product)
            return response(new ProductResource($product),201);

        return response('The product is not created',422);
    }

    public function update(UpdateProductFormRequest $request, $id){

        $requestDto = new UpdateProductRequestDto();
        $requestDto->setCode($request->code);
        $requestDto->setDescription($request->description);
        $requestDto->setUnitPrice($request->unit_price);

        $product = $this->productService->update($requestDto,$id);

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
