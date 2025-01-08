<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

class PriceCategory extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'name',
        'min',
        'max',
        'is_active',
        'created_by_id',
        'updated_by_id'
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            if ($model->min > $model->max) {
                throw ValidationException::withMessages([
                    'min' => ['Nilai Min tidak boleh lebih besar dari Nilai Max. Mohon periksa kembali.'],
                ]);
            }
            if (auth()->check()) {
                $model->created_by_id = auth()->user()->id; // ULID dari user yang login
                $model->name = $model->min ." - ". $model->max;
            }
        });

        static::updating(function ($model) {
            if ($model->min > $model->max) {
                throw ValidationException::withMessages([
                    'min' => ['Nilai Min tidak boleh lebih besar dari Nilai Max. Mohon periksa kembali.'],
                ]);
            }
            if (auth()->check()) {
                $model->updated_by_id = auth()->user()->id; // ULID dari user yang login
                $model->name = $model->min ." - ". $model->max;
            }
        });
    }
}
