<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'name',
        'image',
        'description',
        'is_active',
        'published_at',
        'expired_at',
        'price',
        'show_price',
    ];
}
