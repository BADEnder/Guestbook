<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class GuestbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $test = Member::where('id', Auth::id())->get()[0]->api_token;
        // $test = Member::where('id', Auth::id())->first()->api_token;

        return view("/guestbook", [
            "auth_name" => Auth::user()->name,
            "auth_id" => Auth::id(),
            "auth_api_token" => Auth::user()->api_token
            // "auth_api_token" => $test

        ]);
        
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
    }

}
