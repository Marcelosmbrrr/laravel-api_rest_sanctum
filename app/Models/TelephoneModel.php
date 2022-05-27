<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// Models
use App\Models\UserModel;

class TelephoneModel extends Model
{
    use HasFactory;

    protected $fillable = ["*"];

    /**
    * Table
    */
    public $table = "telephones";

    /**
    * Relationship with user table
    */
    function user(){
        return $this->belongsTo(UserModel::class);
    }
}
