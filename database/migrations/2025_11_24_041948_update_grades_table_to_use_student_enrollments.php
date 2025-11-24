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
        // Drop the old foreign key constraint if it exists
        Schema::table('grades', function (Blueprint $table) {
            // Check if the column exists before trying to drop foreign key
            if (Schema::hasColumn('grades', 'enrollment_id')) {
                $table->dropForeign(['enrollment_id']);
                $table->dropColumn('enrollment_id');
            }
        });

        // Add the new column
        Schema::table('grades', function (Blueprint $table) {
            $table->foreignId('student_enrollment_id')->after('id')->constrained('student_enrollments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('grades', function (Blueprint $table) {
            if (Schema::hasColumn('grades', 'student_enrollment_id')) {
                $table->dropForeign(['student_enrollment_id']);
                $table->dropColumn('student_enrollment_id');
            }
        });

        Schema::table('grades', function (Blueprint $table) {
            $table->foreignId('enrollment_id')->after('id')->constrained('enrollments')->onDelete('cascade');
        });
    }
};
