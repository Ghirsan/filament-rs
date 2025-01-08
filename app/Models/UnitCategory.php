<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitCategory extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'name',
        'is_active',
        'created_by_id',
        'updated_by_id',
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            if (auth()->check()) {
                $model->created_by_id = auth()->user()->id; // ULID dari user yang login
            }
        });

        static::updating(function ($model) {
            if (auth()->check()) {
                $model->updated_by_id = auth()->user()->id; // ULID dari user yang login
            }
        });
    }
}
