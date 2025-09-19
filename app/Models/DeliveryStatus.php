<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryStatus extends Model
{
    public $timestamps = false;
    protected $table = "delivery_statuses";
    protected $fillable = ["title"];
}
