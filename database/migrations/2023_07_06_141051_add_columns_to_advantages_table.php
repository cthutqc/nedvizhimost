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
        Schema::table('advantages', function (Blueprint $table) {
            $table->string('icon')->nullable()->after('name');
            $table->boolean('active')->default(true)->after('icon');
            $table->integer('order')->default(0)->after('active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('advantages', function (Blueprint $table) {
            //
        });
    }
};
