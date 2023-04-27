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
        Schema::create('action_variants', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->integer('order')->default(0);
            $table->boolean('active')->default(true);

            $table->timestamps();
        });

        $variants = [
            'Квартира',
            'Дом',
            'Комната',
            'Коттедж',
            'Таунхаус',
            'Дуплекс',
            'Офис',
            'Торговая площадь',
            'Производственное помещение',
            'Помещение свободного назначения',
            'Склад',
            'Здание',
            'Земельный участок',
            'Гараж',
            'Готовый бизнес',
        ];

        foreach($variants as $variant)
        {
            \App\Models\ActionVariant::create([
                'name' => $variant
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('action_variants');
    }
};
