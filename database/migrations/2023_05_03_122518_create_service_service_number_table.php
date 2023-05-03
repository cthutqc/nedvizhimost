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
        Schema::create('service_service_number', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(\App\Models\Service::class);
            $table->foreignIdFor(\App\Models\ServiceNumber::class);
        });

        \App\Models\ServiceNumber::factory(12)->create()->each(function ($service_number){

            $service = \App\Models\Service::take(1)->inRandomOrder()->first();

            $service->service_numbers()->attach($service_number);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_service_number');
    }
};
