<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Add contact_number only if it does not exist.
        if (!Schema::hasColumn('households', 'contact_number')) {
            Schema::table('households', function (Blueprint $table) {
                $table->string('contact_number')->nullable();
            });
        }

        // Add barangay only if it does not exist.
        if (!Schema::hasColumn('households', 'barangay')) {
            Schema::table('households', function (Blueprint $table) {
                $table->string('barangay')->default('Anoling');
            });
        }
    }

    public function down(): void
    {
        // Intentionally do not drop these columns.
        // They may contain existing production data.
    }
};
