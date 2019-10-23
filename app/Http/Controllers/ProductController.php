<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Categorie;
use Image;



class ProductController extends Controller
{
    public function addproduct()
    {
    	$all_product=Product::all();
        $all_product=Product::paginate(6);
    	$delete_products=Product::onlyTrashed()->get();
      $categotyes=Categorie::all();
    	return view('Product.view', compact('all_product','delete_products','categotyes'));
    }

    public function addproductinsert(Request $request)
{
      
    	 $validatedData = $request->validate([
        'category_id' => 'required',
        'product_name' => 'required',
        'product_description'=>'required',
        'product_code' => 'required',
        'product_price' => 'required|numeric',
        'product_quentity' => 'required',
    ]);

    $product_id= Product::insertGetId([
     'category_id'=>$request->category_id,
     'product_name'=>$request->product_name,
     'product_description'=>$request->product_description,
     'product_code'=>$request->product_code,
     'product_price'=>$request->product_price,
     'product_quentity'=>$request->product_quentity
     ]);
 

       if($request->hasFile('product_image')){
      $photo_to_upload= $request->product_image;
      $filename= $product_id.".".$photo_to_upload->getClientOriginalExtension();
      Image::make($photo_to_upload)->resize(800,850)->save(base_path('public/upload/photos/main/'.$filename));
      Product::find($product_id)->update([
      'product_image'=> $filename
      ]);
    }

     if($request->hasFile('product_left_image')){
      $photo_left_upload= $request->product_left_image;
      $lfilename= $product_id.".".$photo_left_upload->getClientOriginalExtension();
      Image::make($photo_left_upload)->resize(800,850)->save(base_path('public/upload/photos/left/'.$lfilename));
      Product::find($product_id)->update([
      'product_left_image'=> $lfilename
      ]);
    }

 if($request->hasFile('product_right_image')){
      $photo_right_upload= $request->product_right_image;
      $rfilename= $product_id.".".$photo_right_upload->getClientOriginalExtension();
      Image::make($photo_right_upload)->resize(800,850)->save(base_path('public/upload/photos/right/'.$rfilename));
      Product::find($product_id)->update([
      'product_right_image'=> $rfilename
      ]);
    }

 if($request->hasFile('product_up_image')){
      $photo_up_upload= $request->product_up_image;
      $ufilename= $product_id.".".$photo_up_upload->getClientOriginalExtension();
      Image::make($photo_up_upload)->resize(800,850)->save(base_path('public/upload/photos/up/'.$ufilename));
      Product::find($product_id)->update([
      'product_up_image'=> $ufilename
      ]);
    }

     if($request->hasFile('product_down_image')){
      $photo_down_upload= $request->product_down_image;
      $dfilename= $product_id.".".$photo_down_upload->getClientOriginalExtension();
      Image::make($photo_down_upload)->resize(800,850)->save(base_path('public/upload/photos/down/'.$dfilename));
      Product::find($product_id)->update([
      'product_down_image'=> $dfilename
      ]);
    }
      return back()->with('insert', 'Your Product Insert Seccessfully.');
}

    public function addproductedit($id)
    {
    	$single_product_info= Product::findOrFail($id);
    	return view('Product.edit', compact('single_product_info'));
    }

    public function addproductupdate(Request $request)
    {
    	Product::find($request->id)->update([
     'product_name'=>$request->product_name,
     'product_description'=>$request->product_description,
     'product_code'=>$request->product_code,
     'product_price'=>$request->product_price,
     'product_quentity'=>$request->product_quentity
    	]);

      if($request->hasFile('product_image')){
        if(Product::find($request->id)->product_image == 'defaultproductphoto.jpg'){
         $photo_to_upload= $request->product_image;
      $filename= $request->id.".".$photo_to_upload->getClientOriginalExtension();
      Image::make($photo_to_upload)->resize(800,850)->save(base_path('public/upload/photos/main/'.$filename));
      Product::find($request->id)->update([
      'product_image'=> $filename
      ]);

        }
        else
        {
     $delete_photo=Product::find($request->id)->product_image;
     unlink(base_path('public/upload/photos/main/'.$delete_photo));

      $photo_to_upload= $request->product_image;
      $filename= $request->id.".".$photo_to_upload->getClientOriginalExtension();
      Image::make($photo_to_upload)->resize(800,850)->save(base_path('public/upload/photos/main/'.$filename));
      Product::find($request->id)->update([
      'product_image'=> $filename
      ]);
        }
      }

      return back()->with('edit', 'Your Product Edited Seccessfully.');
    }

    public function productsoftdelete($id)
    {
    	Product::where('id',$id)->delete();
    	return back()->with('delete', 'Your Product Delete Seccessfully.');
    }

    public function productrestore($id)
    {
    	Product::onlyTrashed()->where('id',$id)->restore();

    	return back()->with('restore', 'Delete Product Restore Seccessfully.');
    }

    public function productpermanentdelete($id)
    {
      
      $delete_photo=Product::onlyTrashed()->find($id)->product_image;
       unlink(base_path('public/upload/photos/main/'.$delete_photo));

    	Product::onlyTrashed()->where('id',$id)->forceDelete();

    	return back()->with('pdelete', 'Your Product Permanently Deleted Seccessfully.');
    }
}
