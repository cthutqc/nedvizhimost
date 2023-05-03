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
        Schema::create('faq_service', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(\App\Models\Faq::class)->constrained();
            $table->foreignIdFor(\App\Models\Service::class)->constrained();
        });

        \App\Models\Faq::factory(10)->create()->each(function ($faq){

            $page = \App\Models\Service::query()->take(1)->inRandomOrder()->first();

            $page->faqs()->attach($faq);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faq_page');
    }
};
