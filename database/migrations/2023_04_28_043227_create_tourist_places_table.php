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
        Schema::create('tourist_places', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('city', 50);
            $table->string('department', 50);
            $table->decimal('price', 8, 2);
            $table->text('review');
            $table->string('image', 200);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tourist_places');
    }
};
