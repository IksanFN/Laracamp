<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Checkout extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'camp_id', 'midtrans_status', 'midtrans_url', 'midtrans_booking_code', 'discount_id', 'discount_percentage', 'total'];

    public function Camp()
    {
        return $this->belongsTo(Camp::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Discount()
    {
        return $this->belongsTo(Discount::class);
    }
}
