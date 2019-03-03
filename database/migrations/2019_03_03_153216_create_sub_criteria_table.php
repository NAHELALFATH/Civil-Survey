<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubCriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_criteria', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('criterion_id');
            $table->string('name');

            $table->foreign('criterion_id')
                ->references('id')
                ->on('criteria');

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
        Schema::dropIfExists('sub_criteria');
    }
}
