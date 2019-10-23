<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Futureproduct;
use App\Contuct;
use Mail;
use App\Mail\ContuctMessage;
use App\Card;
use Carbon\Carbon;


class FrontendController extends Controller
{
    public function index()
    {
    	$all_products=Product::all();
    	$future_products=Futureproduct::all();
    	return view('welcome',compact('all_products','future_products'));
    }

     public function contuct()
    {
      return view('contuct');
    }
  
   public function productdetails($id)
   {
   	$single_product_info=Product::find($id);
   	$related_product_info=Product::where('id','!=',$id)->where('category_id',$single_product_info->category_id)->get();
   	return view('Product.details', compact('single_product_info','related_product_info'));
   }

   public function productfuturedetails($id)
   {
   	$future_product_info=Futureproduct::find($id);
    $related_fproduct_info=Futureproduct::where('id','!=',$id)->get();
   	return view('Futureproduct.details', compact('future_product_info','related_fproduct_info'));
   }

   public function categorywiseproduct($category_id)
   {
    $c_products =Product::where('category_id', $category_id)->get();
     return view('Frontend.category', compact('c_products'));
   }

   public function contuctinsert(Request $request)
   {

   // print_r($request->except('_token'));

      Contuct::insert([
       'first_name'=>$request->first_name,
       'last_name'=>$request->last_name,
       'subject'=>$request->subject,
       'message'=>$request->message
      ]);

        $first_name=$request->first_name;
         $message=$request->message;
         Mail::to('ashraful562899@gmail.com')->send(new ContuctMessage($first_name, $message));
       
      return back()->with('insert', 'Your Message send Seccessfully.');
   }

   public function addproducttocard($id)
   {
     $ip_address=$_SERVER['REMOTE_ADDR'];
      if(Card::where('customer_ip', $ip_address)->where('id',$id)->exists())
      {
        Card::where('customer_ip', $ip_address)->where('id',$id)->increment('product_quantity', 1);
      }
      else
      {
        Card::insert([
        'customer_ip'=>$ip_address,
        'product_id'=>$id,
        'created_at'=>Carbon::now()
      ]);
      }
       return back();
   }

   public function addcarddetails()
   {
     $card_items=Card::where('customer_ip',$_SERVER['REMOTE_ADDR'])->get();
     return view('Card.view', compact('card_items'));
   }

   public function deletecardproduct($id)
   {
     Card::find($id)->delete();
     return back();
   }

   public function clearcard()
   {
     Card::where('customer_ip',$_SERVER['REMOTE_ADDR'])->delete();
     return back();
   }
}
