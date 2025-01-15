<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mouvements', function (Blueprint $table) {
            $table->id();
        $table->foreignId('person_id')->constrained('person');
        $table->decimal('latitude', 10, 8);  // Latitude
        $table->decimal('longitude', 11, 8); // Longitude
        $table->timestamp('timestamp')->default(DB::raw('CURRENT_TIMESTAMP'));  // Horodatage
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mouvements');
    }
};