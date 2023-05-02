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
        Schema::create('services', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug')->nullable();
            $table->longText('text')->nullable();
            $table->string('h1')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('color')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('active')->default(true);

            $table->timestamps();
        });

        $services = [
            'Продажа недвижимости',
            'Юридические услуги'
        ];

        foreach($services as $service)
        {
            \App\Models\Service::firstOrCreate([
                'name' => $service,
                'text' => fake()->text
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
