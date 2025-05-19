<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'phone', 'email', 'country', 'city', 'address', 'delivery_day', 'delivery_time', 'note'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function user()
{
    return $this->belongsTo(User::class);
}
}
