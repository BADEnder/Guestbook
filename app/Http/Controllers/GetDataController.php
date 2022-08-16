<?php

namespace App\Http\Controllers;

use App\Models\Guestbook;
use App\Models\Replybook;
use Illuminate\Http\Request;

class GetDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     
    public function index(Request $request)
    {
        if($request->input('target_page') == null){
            $result = Guestbook::all();
        }else{
            $target_page = $request->target_page;
            $skip_num = ($target_page -1) *10;
    
            $result = Guestbook::skip($skip_num)->take(10)->get();
        }

        $count = $result->count();

        for($idx=0; $idx<$count; $idx++){
            $reply_id = $result[$idx]->id;
            
            $reply_result = Replybook::where("reply_id", $reply_id)->get();
            $result[$idx]->reply_data=$reply_result;
        
        }
        
        return response()->json($result);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $result = Guestbook::where("id" ,$id)->get();

        $count = $result->count();

        for($idx=0; $idx<$count; $idx++){
            $reply_id = $result[$idx]->id;
            
            $reply_result = Replybook::where("reply_id", $reply_id)->get();
            $result[$idx]->reply_data=$reply_result;
        
        }
        return response($result, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
