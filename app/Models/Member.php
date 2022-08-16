<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Passport\HasApiTokens;


// For use the auth(), and then not extends Model.
class Member extends Authenticatable
{
    use HasFactory, HasApiTokens;
    // use HasFactory;

    
    protected $fillable = [
        "user",
        "name",
        "email",
        "password",
        "active_status",
        "remember_token",
        "api_token"
    ];
    
    public function findForPassport($username)
    {
        return $this->where('user', $username)->first();
    }
}
