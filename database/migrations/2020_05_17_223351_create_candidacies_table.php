<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidaciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidacies', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('student_id')->unsigned()->unique();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');

            $table->bigInteger('grade_id')->unsigned()->unique();
            $table->foreign('grade_id')->references('id')->on('candidacy_grades')->onDelete('cascade');

            $table->bigInteger('status_id')->unsigned()->unique();
            $table->foreign('status_id')->references('id')->on('candidacy_statuses')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('candidacies', function (Blueprint $table){
            $table->dropForeign('candidacies_student_id_foreign');
        });

        Schema::table('candidacies', function (Blueprint $table){
            $table->dropForeign('candidacies_grade_id_foreign');
        });
        Schema::dropIfExists('candidacies');
    }
}
