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
        Schema::table('booking_diagnostic', function (Blueprint $table) {
            $table->string('appointment_booking_id')->nullable()->after('diagnostic_service_id');
            $table->foreign('appointment_booking_id')->references('booking_id')->on('appointments')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('booking_diagnostic', function (Blueprint $table) {
            $table->dropForeign(['appointment_booking_id']);
            $table->dropColumn('appointment_booking_id');
        });
    }
};
