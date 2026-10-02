<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('stylists', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('specialty');
        $table->string('image')->nullable();
        $table->json('available_times'); // ['09:00 AM', '11:00 AM', '02:00 PM'] වගේ සේව් කරන්න
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stylists');
    }
};
