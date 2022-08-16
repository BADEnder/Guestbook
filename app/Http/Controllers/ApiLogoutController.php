<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiLogoutController extends Controller
{
    //
    public function logout(Request $request)
    {

        $credentials = [
            'user' => $request->user,
            'password' => $request->password
        ];
        
        // return $credentials;
        if (Auth::attempt($credentials)) {
            
            Member::where('id', Auth::id())->update(["api_token" => null]);
            
            return response([
                "message" => "log-out success!",
                "token" => ""
            ]);

        }

        return "log-out, failed";
        
    }
}
