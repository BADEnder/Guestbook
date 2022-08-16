<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $warning_message = "";
        return view("information", [
            "warning_message"=>$warning_message,
            "auth_user" => Auth::user()->user,
            "auth_name" => Auth::user()->name,
            "auth_email" => Auth::user()->email
            
        ]);
       
    }


    public function store(Request $request)
    {
        //
        $data = [];
        $user = Member::find(Auth::user()->id);

        if($request->input("name") != Auth::user()->name){
            if(Member::where("name", "=", $request->input("name"))->get()->count() != 0){
                $warning_message = "The name you wanna use is already existed.";
                return view("information", [
                    "warning_message"=>$warning_message,
                    "auth_user" => Auth::user()->user,
                    "auth_name" => Auth::user()->name,
                    "auth_email" => Auth::user()->email
                    
                ]);
            }
            $user->update(['name'=> $request->input('name')]);
            $data["name"] = $request->input('name');
        }

        if($request->input("email") != Auth::user()->email){
            $user->update(['email'=> $request->input('email'), "status" => 0]);
            $data["email"] = $request->input('email');
            $data["status"] = 0 ;
        }
        

        if( $request->input("password") !== null ){
            $password = password_hash($request->input("password"), PASSWORD_DEFAULT);
            $user->update(['password'=> $password]);
            
        }
        // Auth::user()->data);
        return redirect("/");

    }
}
