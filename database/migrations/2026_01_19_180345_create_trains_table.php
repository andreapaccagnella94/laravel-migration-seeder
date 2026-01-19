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
        Schema::create('trains', function (Blueprint $table) {
            $table->id();

            // colonne che aggiungo 
            $table->string("company", 100);
            $table->string("departure_station", 100);
            $table->string("arrival_station", 100);
            $table->timestamp("departure_time", precision: 0);
            $table->timestamp("arrival_time", precision: 0);
            $table->string("id_train", 25)->unique();
            $table->unsignedTinyInteger("carriages");
            $table->boolean("on_time");
            $table->boolean("is_cancelled");

            // automatica
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trains');
    }
};
