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
        Schema::create('mortgage_mortgage_condition', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Mortgage::class)->nullOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(\App\Models\MortgageCondition::class)->nullOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mortgage_mortgage_condition');
    }
};
