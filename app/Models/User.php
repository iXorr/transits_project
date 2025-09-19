<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public $timestamps = true;
    protected $table = "users";
    protected $fillable = ["user_role_id", "name", "surname", "login", "password"];
    protected $hidden = ["password"];

    public function role(): BelongsTo {
        return $this->belongsTo(UserRole::class, 'user_role_id');
    }
    public function vehicles(): HasMany {
        return $this->hasMany(Vehicle::class);
    }

    public function shippings() {
        if ($this->role->title === 'client')
            return $this->hasMany(Shipping::class);

        return $this->hasManyThrough(
            Shipping::class,
            Vehicle::class,
            'driver_id',    // foreign key on vehicles
            'vehicle_id',   // foreign key on shippings
            'id',           // local key on users
            'id'            // local key on vehicles
        );
    }
}
