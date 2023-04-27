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
        Schema::create('action_action_variant', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(\App\Models\Action::class)->constrained();
            $table->foreignIdFor(\App\Models\ActionVariant::class)->constrained();
        });

        \App\Models\Action::all()->each(function ($action){
            \App\Models\ActionVariant::all()->each(function ($variant) use ($action){
                $action->action_variants()->attach($variant);
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('action_action_varian');
    }
};
