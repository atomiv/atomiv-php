<?php

namespace App\Http\Controllers;

use App\Http\Repository\ProductRepository;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    private $productRepo;

    public function __construct(ProductRepository $productRepo){
        $this->productRepo = $productRepo;
    }

    public function getProduct($id){

        $product = $this->productRepo->find($id);

        if ($product)
            return response(new ProductResource($product),200);

        return response('Product not found.',404);
    }

    public function getAllProducts(){

        $products = $this->productRepo->all();

        return response(new ProductCollection($products),200);
    }

    public function create(ProductCreateRequest $request){

        $product = $this->productRepo->save($request->all());

        if ($product)
            return response(new ProductResource($product),201);

        return response('The product is not created',422);
    }

    public function update(ProductUpdateRequest $request,$id){

        $product = $this->productRepo->update($id,$request->all());

        if ($product)
            return response('Product successfully updated',200);

        return response('The product is not updated',422);
    }
    public function delete($id){
        $product = $this->productRepo->delete($id);

        if ($product)
            return response('Product successfully deleted',200);

        return response('Product is not deleted',409);
    }
}
