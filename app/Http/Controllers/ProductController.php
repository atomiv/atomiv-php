<?php

namespace App\Http\Controllers;

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

    public function create(Request $request){
        $this->validate($request,[
            'code' => 'string|required',
            'description' => 'string|nullable',
            'unit_price' => 'numeric|gt:0'
        ]);

        $product = Product::create($request->all());

        if ($product)
            return response($product,201);

        return response('The product is not created',422);
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'code' => 'string',
            'description' => 'string',
            'unit_price' => 'numeric|gt:0'
        ]);

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
