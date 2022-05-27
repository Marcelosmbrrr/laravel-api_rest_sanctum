<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
// Models
use App\Models\UserHasProductModel;
use App\Models\TelephoneModel;
// Factory
use Database\Factories\UserFactory;

class UserModel extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $table = "users";
    protected $fillable = ['name','email','password'];
    protected $hidden = ['password','remember_token'];
    protected $casts = ['email_verified_at' => 'datetime'];

    /**
    * Relationship with user_has_product table
    */
    function user_has_product(){
        return $this->hasMany(UserHasProductModel::class, "user_id");
    }

    /**
    * Relationship with user_has_product table
    *
    */
    function telephone(){
        return $this->hasOne(TelephoneModel::class, "user_id", "id");
    }

    /**
     * Factory 
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory() : \Illuminate\Database\Eloquent\Factories\Factory
    {
        return UserFactory::new();
    }
}
