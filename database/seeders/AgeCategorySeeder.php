<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('age_categories')->insert([
            [
                'id' => \Illuminate\Support\Str::ulid(),
                'name' => 'Child',
                'is_active' => true,
                'created_by_id' => 1, // Sesuaikan dengan user ID yang ada
                'updated_by_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => \Illuminate\Support\Str::ulid(),
                'name' => 'Adult',
                'is_active' => true,
                'created_by_id' => 1, // Sesuaikan dengan user ID yang ada
                'updated_by_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
