<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vehicle extends Model
{
    public $timestamps = true;
    protected $table = "vehicles";
    protected $fillable = ["vehicle_type_id", "driver_id", "capacity", "brand", "model", "factory_number"];

    public function vehicle_type(): BelongsTo {
        return $this->belongsTo(VehicleType::class);
    }

    public function driver(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
