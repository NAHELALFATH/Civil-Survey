<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicTransportUserResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_transport_user_responses', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('respondent_occupation');
            $table->unsignedInteger('respondent_monthly_revenue');
            $table->tinyInteger('is_public_transport_user');
            $table->integer('public_transport_usage_duration')->nullable();
            $table->text('public_transport_usage_purpose')->nullable();
            $table->text('desired_public_transport_type')->nullable();
            $table->text('public_transport_disuse_reason')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('public_transport_user_responses');
    }
}
