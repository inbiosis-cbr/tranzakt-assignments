<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyStudentGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_grades', function (Blueprint $table) {
            $table->dropColumn('student_id');
            $table->dropColumn('subject_id');
            $table->integer('student_subject_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_grades', function (Blueprint $table) {
            $table->dropColumn('student_subject_id');
            $table->integer('student_id');
            $table->integer('subject_id');
        });
    }
}
