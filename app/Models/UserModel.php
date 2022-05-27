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

    /**
    * Table
    *
    */
    public $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

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
