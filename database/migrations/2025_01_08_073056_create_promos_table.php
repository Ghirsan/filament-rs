<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('promos', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name');
            $table->string('image')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamp('published_at')->nullable();
            $table->timestamp('expired_at')->nullable();
            $table->bigInteger('price')->nullable();
            $table->boolean('show_price')->default(true);
            $table->json('genders')->nullable();
            $table->foreignUlid('age_category_id')->constrained('age_categories')->cascadeOnDelete();
            $table->foreignUlid('price_category_id')->constrained('price_categories')->cascadeOnDelete();
            $table->foreignUlid('unit_category_id')->constrained('unit_categories')->cascadeOnDelete();
            $table->foreignId('created_by_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('updated_by_id')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promos');
    }
};
