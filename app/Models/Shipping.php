<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Shipping extends Model
{
    public $timestamps = true;
    protected $table = "shippings";
    protected $fillable = [
        "user_id",
        "vehicle_id",
        "sender_address_id",
        "delivery_address_id",
        "receipt_status_id",
        "delivery_status_id"
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function vehicle(): BelongsTo {
        return $this->belongsTo(Vehicle::class);
    }

    public function receipt_status(): BelongsTo {
        return $this->belongsTo(ReceiptStatus::class);
    }

    public function delivery_status(): BelongsTo {
        return $this->belongsTo(DeliveryStatus::class);
    }

    public function sender_address(): HasOne {
        return $this->hasOne(Address::class, "id", "sender_address_id");
    }

    public function delivery_address(): HasOne {
        return $this->hasOne(Address::class, "id", "delivery_address_id");
    }
}
