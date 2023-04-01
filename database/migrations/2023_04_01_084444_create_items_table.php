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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->longText('text')->nullable();
            $table->string('h1')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('active')->default(true);
            $table->string('address')->nullable();
            $table->integer('price')->default(0);
            $table->integer('rooms')->nullable();
            $table->integer('floor')->nullable();
            $table->integer('floors')->nullable();
            $table->integer('total_area')->nullable();
            $table->integer('living_space')->nullable();
            $table->integer('kitchen_area')->nullable();
            $table->integer('land_area')->nullable();
            $table->decimal('latitude', 15, 10)->nullable();
            $table->decimal('longitude', 15, 10)->nullable();
            $table->foreignId('category_id')->nullable()->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('user_id')->nullable()->nullOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
