<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Modules\TokenExpire;
use App\Models\Member;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiLoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = [
            'user' => $request->user,
            'password' => $request->password
        ];
        
        // return $credentials;
        if (Auth::attempt($credentials)) {

            $apiToken = Str::random(40);
            Member::where('id', Auth::id())->update(["api_token" => $apiToken]);
            TokenExpire::letTokenExpire(Auth::id(), 10);
            $request->session()->regenerate();

            return response([
                "message" => "log-in success!",
                "token" => "$apiToken"
            ]);

        }
        
        // return "log-in failed!";
        return response([
            "message" => "log-in fail!!!!"
        ]);

 
    }
}
