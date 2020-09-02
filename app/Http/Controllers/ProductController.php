<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use Illuminate\Http\Request;
use App\Product;
class ProductController extends Controller
{
    public function getProduct($id){

        $product = Product::find($id);
        if ($product)
            return response($product,200);

        return response('Product not found.',404);
    }

    public function getAllProducts(){

        $products = Product::all();

        return response($products,200);
    }

    public function create(ProductCreateRequest $request){

        $product = Product::create($request->all());

        if ($product)
            return response($product,201);

        return response('The product is not created',422);
    }

    public function update(ProductUpdateRequest $request,$id){

        $product = Product::whereId($id)->update($request->all());

        if ($product)
            return response('Product successfully updated',200);

        return response('The product is not updated',422);
    }
    public function delete($id){
        $product = Product::destroy($id);

        if ($product)
            return response('Product successfully deleted',200);

        return response('Product is not deleted',409);
    }
}
