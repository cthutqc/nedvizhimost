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
        Schema::table('items', function (Blueprint $table) {
            $table->string('renovation')->nullable()->after('longitude');
            $table->string('window-view')->nullable()->after('renovation');
            $table->string('bathroom-unit')->nullable()->after('window-view');
            $table->string('balcony')->nullable()->after('bathroom-unit');
            $table->string('floor-covering')->nullable()->after('balcony');
            $table->boolean('room-furniture')->default(false)->after('floor-covering');
            $table->boolean('air-conditioner')->default(false)->after('room-furniture');
            $table->boolean('phone')->default(false)->after('air-conditioner');
            $table->integer('built-year')->nullable()->after('phone');
            $table->integer('ceiling-height')->nullable()->after('built-year');
            $table->boolean('guarded-building')->default(false)->after('ceiling-height');
            $table->boolean('access-control-system')->default(false)->after('guarded-building');
            $table->boolean('lift')->default(false)->after('access-control-system');
            $table->boolean('rubbish-chute')->default(false)->after('lift');
            $table->boolean('flat-alarm')->default(false)->after('rubbish-chute');
            $table->boolean('alarm')->default(false)->after('flat-alarm');
            $table->boolean('toilet')->default(false)->after('alarm');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('items', function (Blueprint $table) {
            //
        });
    }
};
