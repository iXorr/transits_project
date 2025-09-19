<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReceiptStatus extends Model
{
    public $timestamps = false;
    protected $table = "receipt_statuses";
    protected $fillable = ["title"];
}
