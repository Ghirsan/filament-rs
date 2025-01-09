<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PriceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('price_categories')->insert([
            [
                'id' => Str::ulid(),
                'name' => '0 - 10000',
                'is_active' => true,
                'min' => 0,
                'max' => 10000,
                'created_by_id' => 1, // Sesuaikan dengan user ID yang ada
                'updated_by_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::ulid(),
                'name' => '10001 - 50000',
                'is_active' => true,
                'min' => 10001,
                'max' => 50000,
                'created_by_id' => 1, // Sesuaikan dengan user ID yang ada
                'updated_by_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
