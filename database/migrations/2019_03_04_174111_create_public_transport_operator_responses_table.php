<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicTransportOperatorResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_transport_operator_responses', function (Blueprint $table) {
            $table->increments('id');

            $table->string('respondent_occupation')->comment('Pekerjaan responden.');
            $table->string('is_transport_company_owner')->comment('Apakah responden merupakan pemilik usaha angkutan umum?');
            $table->string('position_in_company')->comment('Posisi responden dalam perusahaan.');
            $table->string('duration_in_business')->comment('Sudah berapa lama dalam usaha angkutan umum?');
            $table->string('company_monthly_revenue')->comment('Omset perusahaan rata – rata per bulan.');
            $table->string('difficulties_in_operation')->comment('Sebagai Operator angkutan umum, Kesulitan apa saja yang dihadapi dalam penyelenggaraan angkutan umum?');
            $table->string('wish_and_recommendations')->comment('Harapan, saran, dan usul terhadap penyelenggaraan angkutan umum.');
            $table->string('desired_types_of_public_transport')->comment('Jenis  angkutan umum yang bagaimana yang harusnya dibangun dari sudut pandang Bapak/Ibu investor dan/atau sebagai operator angkutan umum?');

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
        Schema::dropIfExists('public_transport_operator_responses');
    }
}
