<?php

namespace App\Http\Controllers\Modules;

use mysqli;
use Illuminate\Support\Str;

class TokenExpire
{
    static $host = "localhost";
    static $user = "root";
    static $password = "test123";
    static $database = "DB_GB_L";
    // static $event_name = Str::random(50);


    static function letTokenExpire($id, $minute) {
        $db_conection = new mysqli(self::$host, self::$user, self::$password, self::$database);
        $table = "members";
        $column = "api_token";
        $event_name = Str::random(40);
        
        $time = "CURRENT_TIMESTAMP + INTERVAL $minute MINUTE";
        // $time = "CURRENT_TIMESTAMP + INTERVAL 10 SECOND";

    
        $event_target = "UPDATE $table SET $column=null WHERE id=$id";
        $mysql_command = "CREATE EVENT $event_name ON SCHEDULE AT $time DO $event_target";
        
        
        mysqli_query($db_conection, $mysql_command);
    }
    
    

}
