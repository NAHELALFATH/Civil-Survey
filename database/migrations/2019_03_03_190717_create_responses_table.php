<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responses', function (Blueprint $table) {
            $table->increments('id');

            $table->string('respondent_name');
            $table->string('respondent_sex');
            $table->unsignedSmallInteger('respondent_age');
            $table->text('respondent_address');

            $table->string('respondent_occupation');
            $table->unsignedInteger('respondent_monthly_revenue');
            $table->tinyInteger('is_public_transport_user');
            $table->integer('public_transport_usage_duration');
            $table->text('public_transport_usage_purpose');
            $table->text('desired_public_transport_type');
            $table->text('public_transport_disuse_reason');

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
        Schema::dropIfExists('responses');
    }
}
