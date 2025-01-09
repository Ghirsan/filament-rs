<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Symfony\Component\Uid\Ulid;

class UnitCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('unit_categories')->insert([
            [
                'id' => Str::ulid(),
                'name' => 'Category 1',
                'is_active' => true,
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::ulid(),
                'name' => 'Category 2',
                'is_active' => true,
                'created_by_id' => 1,
                'updated_by_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::ulid(),
                'name' => 'Category 3',
                'is_active' => false,
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::ulid(),
                'name' => 'Category 4',
                'is_active' => true,
                'created_by_id' => null,
                'updated_by_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::ulid(),
                'name' => 'Category 5',
                'is_active' => false,
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
