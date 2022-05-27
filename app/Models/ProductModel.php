<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// Models
use App\Models\UserHasProductModel;
// Factory
use Database\Factories\ProductFactory;

class ProductModel extends Model
{
    use HasFactory;

    /**
    * Table
    *
    */
    public $table = "products";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ["*"];

    /**
    * Relationship with user_has_product table
    */
    function user_has_product(){
        return $this->hasMany(UserHasProductModel::class);
    }

    /**
     * Factory 
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory() : \Illuminate\Database\Eloquent\Factories\Factory
    {
        return ProductFactory::new();
    }
}
