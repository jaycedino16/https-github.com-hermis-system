<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('households', function (Blueprint $table) {
            $table->id();

            $table->string('household_head');
            $table->string('contact_number');
            $table->string('purok');
            $table->string('barangay');
            $table->integer('members');
            $table->string('risk_level');
            $table->string('status')->default('Registered');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('households');
    }
};