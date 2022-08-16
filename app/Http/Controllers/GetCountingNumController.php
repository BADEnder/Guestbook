<?php

namespace App\Http\Controllers;

use App\Models\Guestbook;
use App\Models\Replybook;
use Illuminate\Http\Request;

class GetCountingNumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($beginning_date, $ending_date)
    {
        // return $beginning_date;
        $result = [];

        $beginning_time = strtotime($beginning_date);
        $ending_time = strtotime($ending_date);
        // $beginning_date = strtotime($request["beginning_date"]);
        // $ending_date = strtotime($request["ending_date"]);

        $total_GB = Guestbook::where("updated_at", ">", $beginning_date)->where("updated_at", "<", $ending_date)->get();
        $total_RB = Replybook::where("updated_at", ">", $beginning_date)->where("updated_at", "<", $ending_date)->get();

        // $total_GB = Guestbook::where("updated_at",">",$request["beginning_date"])->where("updated_at","<",$request["ending_date"])->get();
        // $total_RB = Replybook::where("updated_at",">",$request["beginning_date"])->where("updated_at","<",$request["ending_date"])->get();
                
        
        for($date = $beginning_time; $date < $ending_time; $date += 86400){
            $beginning_time = date('Y-m-d H:i:s', $date);
            $ending_time = date('Y-m-d H:i:s', $date+86400);

            $cur_num_GB = $total_GB->where("updated_at",">", $beginning_time)
            ->where("updated_at", "<", $ending_time)
            ->count();

            $cur_num_RB = $total_RB->where("updated_at",">", $beginning_time)
            ->where("updated_at", "<", $ending_time)
            ->count();

            if($cur_num_GB != 0 || $cur_num_RB !=0){
                $beginning_time= substr($beginning_time, 0, 10);
                array_push($result, [
                    "date" => $beginning_time,
                    "message_num" => $cur_num_GB,
                    "reply_num" => $cur_num_RB
                ]);
            }
        }

        // return $result;
        // return $request;
        return response()->json($result);
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
