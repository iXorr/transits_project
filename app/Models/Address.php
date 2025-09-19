<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public $timestamps = false;
    protected $table = "addresses";
    protected $fillable = ["city", "street", "building", "apartments"];
}
