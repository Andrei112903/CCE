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
        Schema::table('subjects', function (Blueprint $table) {
            $table->string('program')->nullable()->after('units');
            $table->string('year_level')->nullable()->after('program');
            $table->string('term')->nullable()->after('year_level');
            $table->string('schedule')->nullable()->after('term');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subjects', function (Blueprint $table) {
            $table->dropColumn(['program', 'year_level', 'term', 'schedule']);
        });
    }
};
