<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Futureproduct;
use Image;

class FutureController extends Controller
{
     public function addfutureproduct()
     {
     	$future_products=Futureproduct::all();
     	$delete_fproducts=Futureproduct::onlyTrashed()->get();
     	return view('Futureproduct.view',compact('future_products','delete_fproducts'));
     }

     public function addfutureproductinsert(Request $request)
     {
     	 $validatedData = $request->validate([
        'product_name'=>'required',
        'product_description'=>'required',
        'product_code'=>'required',
        'product_quentity'=>'required|numeric',
    ]);
     
     $future_id=Futureproduct::insertGetId([
      'product_name'=>$request->product_name,
      'product_description'=>$request->product_description,
      'product_code'=>$request->product_code,
      'product_quentity'=>$request->product_quentity
     ]);
     
     if($request->hasFile('product_image')){
        $future_photo= $request->product_image;
        $future_upload=$future_id.".".$future_photo->getClientOriginalExtension();

        Image::make($future_photo)->resize(800,850)->save(base_path('public/upload/Futurephotos/best/'.$future_upload));
        Futureproduct::find($future_id)->update([
        'product_image'=>$future_upload,
        ]);

         }

        if($request->hasFile('product_left_image')){
        $future_left= $request->product_left_image;
        $future_lupload=$future_id.".".$future_left->getClientOriginalExtension();

        Image::make($future_left)->resize(800,850)->save(base_path('public/upload/Futurephotos/left/'.$future_lupload));
        Futureproduct::find($future_id)->update([
        'product_left_image'=>$future_lupload
        ]);
         }

         if($request->hasFile('product_right_image')){
        $future_right= $request->product_right_image;
        $future_rupload=$future_id.".".$future_right->getClientOriginalExtension();

        Image::make($future_right)->resize(800,850)->save(base_path('public/upload/Futurephotos/right/'.$future_rupload));
        Futureproduct::find($future_id)->update([
        'product_right_image'=>$future_rupload
        ]);
         }

         if($request->hasFile('product_up_image')){
        $future_up= $request->product_up_image;
        $future_uupload=$future_id.".".$future_up->getClientOriginalExtension();

        Image::make($future_up)->resize(800,850)->save(base_path('public/upload/Futurephotos/up/'.$future_uupload));
        Futureproduct::find($future_id)->update([
        'product_up_image'=>$future_uupload
        ]);
         }

         if($request->hasFile('product_down_image')){
        $future_down= $request->product_down_image;
        $future_dupload=$future_id.".".$future_down->getClientOriginalExtension();

        Image::make($future_down)->resize(800,850)->save(base_path('public/upload/Futurephotos/down/'.$future_dupload));
        Futureproduct::find($future_id)->update([
        'product_down_image'=>$future_dupload
        ]);
         }
    
     return back()->with('insert', 'Your Future Product Insert Seccessfully.');
     }

     public function addfutureproductedit($id)
     {
     	$edit_fproduct=Futureproduct::find($id);
     	return view('Futureproduct.edit', compact('edit_fproduct'));
     }

     public function addfutureproductupdate(Request $request)
     {
     	Futureproduct::find($request->id)->update([
      'product_name'=>$request->product_name,
      'product_description'=>$request->product_description,
      'product_code'=>$request->product_code,
      'product_quentity'=>$request->product_quentity
     	]);

        if($request->hasFile('product_image')){
         if(Futureproduct::find($request->id)->product_image == 'defaultfutureproduct.jpg'){
         $future_photo= $request->product_image;
        $future_upload=$request->id.".".$future_photo->getClientOriginalExtension();

        Image::make($future_photo)->resize(800,850)->save(base_path('public/upload/Futurephotos/best/'.$future_upload));
        Futureproduct::find($request->id)->update([
        'product_image'=>$future_upload,
        ]);

        }
        else
        {
        
       $delete_future_photo=Futureproduct::find($request->id)->product_image;
        unlink(base_path('public/upload/Futurephotos/best/'.$delete_future_photo));

        $future_photo= $request->product_image;
        $future_upload=$request->id.".".$future_photo->getClientOriginalExtension();

        Image::make($future_photo)->resize(800,850)->save(base_path('public/upload/Futurephotos/best/'.$future_upload));
        Futureproduct::find($request->id)->update([
        'product_image'=>$future_upload,
        ]);


        }
       }
      return back()->with('update', 'Your Future Product Update Seccessfully.');
     }

     public function addfutureproductdelete($id)
     {
     	Futureproduct::where('id',$id)->delete();

     	return back()->with('fdelete', 'Your Future Product Deleted Seccessfully.');
     }

     public function addfutureproductrestore($id)
     {
     	Futureproduct::onlyTrashed()->where('id',$id)->restore();

     	return back()->with('frestore', 'Delete Future Product Restore Seccessfully.');
     }

     public function futureproductforce($id)
     {
          
        $delete_future_photo=Futureproduct::onlyTrashed()->find($request->id)->product_image;
         unlink(base_path('public/upload/Futurephotos/best/'.$delete_future_photo));
     	
     	Futureproduct::onlyTrashed()->where('id',$id)->forceDelete();

     	return back()->with('ffdelete', 'Future Product Parmanently Deleted Seccessfully.');
     }
}
