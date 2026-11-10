<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('hazard_alerts', function (Blueprint $table) {
            $table->string('title')->nullable();
            $table->string('hazard_type')->nullable();
            $table->string('severity')->nullable();
            $table->text('description')->nullable();
            $table->string('affected_area')->nullable();
            $table->string('status')->default('Active');
            $table->dateTime('issued_at')->nullable();
            $table->dateTime('expires_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('hazard_alerts', function (Blueprint $table) {
            $table->dropColumn([
                'title',
                'hazard_type',
                'severity',
                'description',
                'affected_area',
                'status',
                'issued_at',
                'expires_at',
            ]);
        });
    }
};