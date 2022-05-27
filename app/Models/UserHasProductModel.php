<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// Models
use App\Models\UserModel;
use App\Models\ProductModel;

class UserHasProductModel extends Model
{
    use HasFactory;

    public $table = "user_has_product";
    protected $fillable = ["*"];
    public $timestamps = false;

    /**
    * Relationship with user table
    */
    function user(){
        return $this->belongsTo(UserModel::class);
    }   

    /**
    * Relationship with product table
    */
    function product(){
        return $this->belongsTo(ProductModel::class, "product_id", "id");
    }
}
