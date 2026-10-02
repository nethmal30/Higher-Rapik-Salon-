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
        Schema::table('appointments', function (Blueprint $table) {
            // 📌 ඩේටාබේස් එකට අඩුවෙලා තියෙන Columns දෙක මෙතනින් එකතු කරනවා
            $table->date('booking_date')->nullable();
            $table->string('booking_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            // 📌 මයිග්‍රේෂන් එක රෝල්බැක් කලොත් Columns දෙක අයින් වෙන්න මෙතනට දැම්මා
            $table->dropColumn(['booking_date', 'booking_time']);
        });
    }
};