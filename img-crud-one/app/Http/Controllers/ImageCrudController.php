<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImageCrud;
use File;
use Session;

class ImageCrudController extends Controller
{
    public function all_products(){
        $products = ImageCrud::all();
        // return $products;
        return  view ('products', ['productData'=>$products]);
    }
    public function add_new_product(){
        return  view ('add_new_product');
    }
    public function store_product(Request $request){
       $request->validate([
        'name' => 'required',
        'image' => 'required|mimes:png,jpg,jpeg',
       ]); 

       $imageName = '';
       if($image = $request->file('image')){
        $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
        $image->move('images/products', $imageName);
       }

       ImageCrud::create([
        'name' => $request->name,
        'image' => $imageName,
       ]);

       Session::flash('msg', 'Product Added Successfully');
    //    session()->flash('msg','Product Added Successfully');
      return redirect()->back();

    }

    // edit product

    public function edit_product($id){

        $product = ImageCrud::findOrFail($id);
        // return $product;
        return view ('edit_product', compact('product'));
        // return view ('edit_product', ['product'=>$product]);
    }

    //update product

    public function update_product(Request $request, $id){

        $product = ImageCrud::findOrFail($id);
        $request->validate([
         'name' => 'required', 
        ]); 
 
        $imageName = '';
        $deleteOldImage = 'images/products'.$product->image;
        
        if($image = $request->file('image')){
            if(file_exists($deleteOldImage)){
                File::delete($deleteOldImage);
            }
         $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
         $image->move('images/products', $imageName);
        }else{
            $imageName = $product->image;
        }
 
        ImageCrud::where('id', $id)->update([
         'name' => $request->name,
         'image' => $imageName,
        ]);
 
        Session::flash('msg', 'Product Updated Successfully');
     //    session()->flash('msg','Product Added Successfully');
       return redirect()->back();
 
     }
}
