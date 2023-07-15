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
        Schema::create('service_service_job', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(\App\Models\Service::class)->nullOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(\App\Models\ServiceJob::class)->nullOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_service_job');
    }
};
