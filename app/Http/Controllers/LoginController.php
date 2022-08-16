<?php


namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Modules\TokenExpire;



class LoginController extends Controller
{
    
    public function index()
    {
        
        //
        $warning_message = "";
        return view("/log-in", ["warning_message" => $warning_message]);
        
    }


    public function login(Request $request)
    {


        // $credentials = [
        //     'user' => $request->user,
        //     'password' => $request->password
        // ];
        
        // 再不默認post刷新頁面下，此方法可以回傳網頁瀏覽器state code 4xx.
        $credentials = $request->validate([
            'user' => ['required'],
            'password' => ['required']
        ]);

        $remember = $request->input("remember_me");

        
        if (Auth::attempt($credentials, $remember)) {

            $apiToken = Str::random(40);

            Member::where('id', Auth::id())->update(["api_token" => $apiToken]);

            // TokenExpire::letTokenExpire(Auth::id(), 10);

            // 重新產生laravel內置在session的_token
            // $request->session()->regenerate();

            return redirect("/");
        }
        

        $request->session()->regenerate();
        $warning_message = "This account doesn't exist, or password is wrong.";
        return view("/log-in", ["warning_message" => $warning_message]);


    }
    
    // public function store(Request $request)
    // {
    //     // $token = csrf_token();
    //     // return $request;
    //     $user = $request->input('user');
    //     $password = $request->input('password');

    //     $result = Member::where("user", $user)->get();
    //     $count = $result->count();
        
    //     if($count !=0){
    //         if(password_verify($password, $result[0]->password)){
    //             
    //             $data = [
    //                 "id" => $result[0]->id,
    //                 "user"=> $result[0]->user,
    //                 "name"=> $result[0]->name,
    //                 "email"=> $result[0]->email,
    //                 "status"=> $result[0]->status,
    //                 "token" => $result[0]->token,
    //                 "created_at" => $result[0]->created_at,
    //                 "updated_at" => $result[0]->updated_at
    //             ];

    //             session($data);

    //             if($request->input("remember_me") == "on"){
    //                 setcookie("id", $result[0]->id, time() + 86400);
    //                 setcookie("create_time", $result[0]->created_at, time() + 86400);
    //             }
    //             return redirect("/log-in-suc");
                
    //         }else{
    //             $warning_message = "This password is wrong.";
    //             return view("/log-in", ["warning_message" => $warning_message]);
    //         }

    //     }else{
    //             $warning_message = "This account doesn't exist.";
    //             return view("/log-in", ["warning_message" => $warning_message]);
    //     }

    // }

}
