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
         //   $table->foreignIdFor(\App\Models\ItemType::class)->nullable()->nullOnDelete()->cascadeOnUpdate()->after('deal_type_id');
        });

        $itemTypes = [
            'Квартира',
            'Комната',
            'Квартира в новостройке',
            'Доля в квартире',
            'Дом/Дача',
            'Коттедж',
            'Таунхаус',
            'Дуплекс',
            'Часть дома',
            'Участок',
        ];

        foreach ($itemTypes as $itemType)
            \App\Models\ItemType::firstOrCreate([
                'name' => $itemType
            ]);
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
