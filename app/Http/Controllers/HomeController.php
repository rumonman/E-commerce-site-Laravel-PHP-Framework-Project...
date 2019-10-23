<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Contuct;
use App\Categorie;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $all_users = User::all();
        $restors=User::onlyTrashed()->get();
        return view('user' ,compact('all_users','restors'));
    }

    public function userdelete($id)
    {
        User::Where('id', $id)->delete();

        return back()->with('delete','User Informetion Delete Successfully.');
    }

    public function userrestore($id)
    {
        User::onlyTrashed()->where('id',$id)->restore();

        return back()->with('restor','Delete User Informetion Restor Successfully.');
    }

    public function useredit($id)
    {
        $user_edit=User::find($id);
        return view('edit', compact('user_edit'));
    }

    public function usereditupdate(Request $request)
    {
        User::findOrFail($request->id)->update([
           'name'=>$request->name,
           'email'=>$request->email
        ]);

        return back()->with('edit','Edit User Informetion Successfully.');
    }

    public function userforcedelete($id)
    {
        User::onlyTrashed()->where('id',$id)->forceDelete();

        return back()->with('force','User Informetion Permanently Delete Successfully.');
    }

    public function contuctmassageview()
    {
        $allcontucts=Contuct::all();
        return view('Contuct.view',compact('allcontucts'));
    }
    
    public function changebuttonstatus($id)
    {
        if(Categorie::find($id)->manu_status == 0){
           Categorie::find($id)->update([
            'manu_status'=> true
         ]);
        }
        else
        {
          Categorie::find($id)->update([
           'manu_status'=> false
         ]);
        }
        return back();
    }
    
    public function contuctmessagedelete($id)
    {
      Contuct::where('id',$id)->delete();
      return back()->with('contuct','Contuct Message Delete Successfully.'); 
    }
}
