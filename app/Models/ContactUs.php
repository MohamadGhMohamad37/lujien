<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'phone',
        'whatsapp_link',
        'facebook_link',
        'instagram_link',
        'address_en',
        'address_ar',
        'map_link',
    ];

}
