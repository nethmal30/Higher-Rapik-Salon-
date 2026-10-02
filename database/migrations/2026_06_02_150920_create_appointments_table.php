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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('name');              // customer name[cite: 1]
            $table->string('email');             // email[cite: 1]
            $table->date('booking_date');        // date and time[cite: 1]
            $table->string('service');           // seveces[cite: 1]
            $table->text('message')->nullable(); // othe[cite: 1]
            $table->string('status')->default('Pending'); // [cite: 1]
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};