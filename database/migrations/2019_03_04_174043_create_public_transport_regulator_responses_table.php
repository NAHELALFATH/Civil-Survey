<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicTransportRegulatorResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_transport_regulator_responses', function (Blueprint $table) {
            $table->increments('id');

            $table->string("department")->comment("Instansi.");
            $table->string("position")->comment("Jabatan.");
            $table->string("department_authority_level")->comment("Tingkat kewenangan instansi.");
            $table->string("difficulties_in_public_trans_impl")->comment("Kesulitan apa saja yang dihadapi dalam penyelenggaraan angkutan umum?");
            $table->string("wishes_recommendations_for_impl")->comment("Apa harapan, saran dan usul dalam penyelenggaraan angkutan umum?");
            $table->string("recommended_public_trans_type")->comment("Jenis angkutan umum yang bagaimana yang harusnya dibangun dari sudut pandang pemerintah / pengambil kebijakan?");

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
        Schema::dropIfExists('public_transport_regulator_responses');
    }
}
