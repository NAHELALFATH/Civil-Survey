<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_datas', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('response_id');
            $table->unsignedInteger('type_id');
            $table->unsignedInteger('criterion_id');
            $table->unsignedInteger('sub_criterion_id');
            $table->unsignedInteger('alternative_id')->nullable();
            $table->string('rating');

            $table->foreign('response_id')
                ->references('id')
                ->on('responses');

            $table->foreign('alternative_id')
                ->references('id')
                ->on('alternatives');

            $table->foreign('sub_criterion_id')
                ->references('id')
                ->on('sub_criteria');

            $table->foreign('criterion_id')
                ->references('id')
                ->on('criteria');

            $table->foreign('type_id')
                ->references('id')
                ->on('types');

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
        Schema::dropIfExists('survey_datas');
    }
}
