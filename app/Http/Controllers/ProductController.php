<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    function addproduct(Request $req){
        $product = new Product;
        $product->name = $req->input('name');
        $product->price = $req->input('price');
        $product->description = $req->input('description');
        $product->file_path = $req->file('file')->store('products');

        $product->save();
        return $product;
    }

    function list(){
         return Product::all();
    }

    function delete($id){
        $result = Product::where('id',$id)->delete();
        if ($result){
            return ["result"=>"Product has been deleted"];
        } else {
            return ["result"=>"Operation failed"];
        }
    }
}
