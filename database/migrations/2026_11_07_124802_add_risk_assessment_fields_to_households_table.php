
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('households', function (Blueprint $table) {
            $table->string('hazard_exposure')->nullable();
            $table->string('distance_from_hazard')->nullable();
            $table->unsignedInteger('vulnerable_members')->nullable();
            $table->string('house_condition')->nullable();
            $table->string('evacuation_accessibility')->nullable();
            $table->unsignedTinyInteger('risk_score')->nullable();
            $table->timestamp('risk_assessed_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('households', function (Blueprint $table) {
            $table->dropColumn([
                'hazard_exposure',
                'distance_from_hazard',
                'vulnerable_members',
                'house_condition',
                'evacuation_accessibility',
                'risk_score',
                'risk_assessed_at',
            ]);
        });
    }
};
