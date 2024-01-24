<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Schema;

class ProductController extends Controller
{

    function crud(){
        $result=Schema::drop('products');
        return $result;
    }

   public function products(){
    $products=Product::latest()->paginate(5);
    // return view('products', compact('products'));
    return view('products', ["products"=>$products]);
   }


   //add product
   public function addProduct(Request $request){
    $request->validate(
        [
            'name'=>'required|unique:products',
            // 'name'=>'required',
            'price'=>'required',
        ],
        // [
        //     'name.required'=>'Name is Required',
        //     'name.unique'=>'Product Already Exists',
        //     'price.required'=>'Price is Required',
        // ]
    );

    $product = new Product();
    $product->name = $request->name;
    $product->price = $request->price;
    $product->save();
   }

   //update product

   public function updateProduct(Request $request) {
    $request->validate([
        'up_name' => 'required',
        'up_price' => 'required',
    ]);
    Product::where('id', $request->up_id)->update([
        'name' => $request->up_name,
        'price' => $request->up_price,
    ]);
    // Product::find($request->up_id)->update([
    //     'name' => $request->up_name,
    //     'price' => $request->up_price
    // ]);
   }

   public function deleteProduct(Request $request){
    Product::find($request->product_id)->delete();
   }

   //pagination
   public function pagination(Request $request){
    $products=Product::latest()->paginate(5);
    return view('pagination_products', ["products"=>$products])->render();
    // return view('pagination_products', ["products"=>$products]);
   }

   //search product

   public function searchProduct(Request $request){
        $products = Product::where('name', 'like', '%'.$request->search_string.'%')
        ->orWhere('price', 'like', '%'.$request->search_string.'%')
        ->orderBy('id', 'desc')
        ->paginate(5);

        if($products->count() >=1){
            return view('pagination_products', ['products'=>$products])->render();
        }else{
            return response()->json([
                'status'=>'nothing_found',
            ]);
        }
   }
}
