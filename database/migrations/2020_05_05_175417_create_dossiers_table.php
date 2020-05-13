<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDossiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dossiers', function (Blueprint $table) {
            $table->id();
            $table->string('path_to_cv')->nullable();
            $table->string('path_to_cover_letter')->nullable();
            $table->string('path_to_transcript')->nullable();
            $table->string('path_to_print_screen_ent')->nullable();
            $table->string('path_to_registration_form')->nullable();
            $table->timestamps();

            $table->bigInteger('student_id')->unsigned()->unique();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dossiers', function (Blueprint $table){
            $table->dropForeign('dossiers_user_id_foreign');
        });
        Schema::dropIfExists('dossiers');
    }
}
