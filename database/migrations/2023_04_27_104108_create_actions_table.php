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
        Schema::create('actions', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->integer('order')->default(0);
            $table->boolean('active')->default(true);

            $table->timestamps();
        });

        $actions = [
            'Продать',
            'Купить',
            'Сдать',
            'Арендовать'
        ];

        foreach ($actions as $action) {
            \App\Models\Action::create([
                'name' => $action
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actions');
    }
};
