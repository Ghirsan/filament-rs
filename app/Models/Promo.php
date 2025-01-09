<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory, HasUlids;

    public function ageCategory()
    {

        return $this->belongsTo(AgeCategory::class);

    }

    public function priceCategory()
    {

        return $this->belongsTo(PriceCategory::class);

    }

    public function unitCategory()
    {
        return $this->belongsTo(UnitCategory::class);
    }

    protected $fillable = [
        'name',
        'image',
        'description',
        'is_active',
        'published_at',
        'expired_at',
        'price',
        'show_price',
        'gender',
        'age_category_id',
        'price_category_id',
        'unit_category_id',
        'created_by_id',
        'updated_by_id'
    ];
}
