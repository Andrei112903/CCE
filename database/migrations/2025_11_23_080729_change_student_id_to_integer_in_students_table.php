<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // First, convert any existing string student IDs to numeric
        // This handles the case where there's existing data
        $students = DB::table('students')->get();
        $year = (int) date('Y');
        $counter = 1;
        
        foreach ($students as $student) {
            // If student_id is already numeric, skip
            if (is_numeric($student->student_id)) {
                continue;
            }
            
            // Generate new numeric ID
            $newId = $year * 10000 + $counter;
            while (DB::table('students')->where('student_id', $newId)->exists()) {
                $counter++;
                $newId = $year * 10000 + $counter;
            }
            
            // Update the student ID
            DB::table('students')
                ->where('id', $student->id)
                ->update(['student_id' => $newId]);
            
            $counter++;
        }
        
        // Drop unique index using raw SQL (safer)
        DB::statement('ALTER TABLE students DROP INDEX IF EXISTS students_student_id_unique');
        DB::statement('ALTER TABLE students DROP INDEX IF EXISTS student_id');
        
        Schema::table('students', function (Blueprint $table) {
            // Change column type from string to unsigned big integer
            $table->unsignedBigInteger('student_id')->change();
        });
        
        // Re-add unique constraint
        Schema::table('students', function (Blueprint $table) {
            $table->unique('student_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            // Drop the unique index
            $table->dropUnique(['student_id']);
            
            // Change back to string
            $table->string('student_id')->change();
            
            // Re-add the unique constraint
            $table->unique('student_id');
        });
    }
};
