<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDeletedAtToSubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subject', function (Blueprint $table) {
            //Change to text for description
            $table->text('description')->change();

            //add deleted_at for softDeletes
            $table->softDeletes();
        });

        //Rename to plural
        Schema::rename('subject', 'subjects');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Rename to plural
        Schema::rename('subjects', 'subject');

        Schema::table('subject', function (Blueprint $table) {
            //Change to text for description
            $table->string('description')->change();

            //add deleted_at for softDeletes
            $table->dropColumn('deleted_at');
        });
    }
}
