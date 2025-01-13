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

    public static function getCategoryId($price)
    {
        $priceCategory = PriceCategory::where('min', '<=', $price)
        ->where( 'max', '>=', $price)
        ->first();
        return $priceCategory ? $priceCategory->id : null;
    }

    protected static function booted()
    {
        static::creating(function ($model) {
            if (auth()->check()) {
                $model->created_by_id = auth()->user()->id; // ULID dari user yang login
            }
            // dd($model->price);
            $model->price_category_id = self::getCategoryId($model->price);
        });

        static::updating(function ($model) {
            if (auth()->check()) {
                $model->updated_by_id = auth()->user()->id; // ULID dari user yang login
            }
        });
    }
}
