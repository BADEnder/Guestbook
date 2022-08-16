<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class SignupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $warning_message ="";
        return view("sign-up", ["warning_message" => $warning_message]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user = $request["user"];
        $name = $request["name"];
        $email = $request["email"];
        $password = password_hash($request["password"], PASSWORD_DEFAULT);
        
        $check_user = Member::where("user", "=", $user)->get();
        $count_check_user = $check_user->count();
        
        if ($count_check_user != 0){
            
            $warning_message= "User already existed";
            return view("sign-up", ["warning_message" => $warning_message]) ;
            // return view("sign-up", ["warning_message"=> $warning_message]);
            
        }
        $check_name = Member::where("name", "=", $name)->get();

        $count_check_name = $check_name->count();
        if($count_check_name != 0){
            $warning_message= "Name already existed";
            return view("sign-up", ["warning_message" => $warning_message]) ;
        }

        $data = [
            "user"=> $user, 
            "name"=> $name,
            "email"=> $email,
            "password" => $password
        ];
        Member::create($data);
        return redirect("sign-up-suc");

        

    }
    

}
