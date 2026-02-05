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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->longText('image')->nullable();
            $table->string('name');
            $table->foreignId('address_id')->constrained('addresses')->onDelete('cascade');
            $table->integer('square');
            $table->string('amenities');
            $table->integer('number_of_guests');
            $table->integer('price');
            $table->foreignId('owner_id')->constrained('owners')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartments');
    }
};
