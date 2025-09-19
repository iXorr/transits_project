<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    public $timestamps = false;
    protected $table = "user_roles";
    protected $fillable = ["title"];

    public static function getId($title) {
        return self::Where("title", $title)->first()->id;
    }
}
