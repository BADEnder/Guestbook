<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Replybook extends Model
{
    use HasFactory;
    
    protected $fillable=[
        "reply_id",
        "name",
        "content"
    ];

    protected function serializeDate(DateTimeInterface $date){
        if($this->dateFormat){
            return $date->format($this->dateFormat);
        }else{
            return $date->format('Y-m-d H:i:s');
        }
    }
}
