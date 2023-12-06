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
        Schema::create('foods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->integer('price')->nullable();
            $table->string('eng_name')->nullable();
            $table->timestamps();
        });

        Schema::create('sub_foods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('food_id');
            $table->integer('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foods');
        Schema::dropIfExists('sub_foods');
    }
};
