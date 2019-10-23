<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use Carbon\Carbon;

class CategorieController extends Controller
{
    public function addproductcategorie()
    {
    	$all_categorys=Categorie::all();
    	return view('Categorie.view',compact('all_categorys'));
    }

    public function productcategorieinsert(Request $request)
    {

      
           $request->validate([
        'category_name' => 'required|unique:categories,category_name',
        ]);

       if(isset($request->manu_status)){
        Categorie::insert([
        'category_name' => $request->category_name,
        'manu_status' => true,
        'created_at'    => Carbon::now()
        ]);
       }else{
        Categorie::insert([
        'category_name' => $request->category_name,
        'manu_status' => false,
        'created_at'=> Carbon::now()
        ]);
       }

     return back()->with('status', 'Your Category Created Successfully.');
    }
}
