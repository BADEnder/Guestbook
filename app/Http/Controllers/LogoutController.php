<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{

    public function index(Request $request)
    {
        //
        // $data = [
        //     "id" => null,
        //     "user"=> null,
        //     "name"=> null,
        //     "email"=> null,
        //     "status"=> null,
        //     "token" => null,
        //     "created_at" => null,
        //     "updated_at" => null
        // ];
        // session($data);
        if (Auth::id() != null){
            Member::where('id', Auth::id())->update(["api_token" => null]);
            Auth::logout();
            $request->session()->invalidate();

            // 上方指令就會重新刷新CSRFToken，即不需要下面這個或更下面的。
            // $request->session()->regenerateToken();
            // $request->session()->regenerate();
            return view("log-out");
        }
        
        return "You didn't log in.";
        // 上方指令就會重新刷新CSRFToken，即不需要下面這個或更下面的。
        // $request->session()->regenerateToken();
        // $request->session()->regenerate();

        
    }

}
