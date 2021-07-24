<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateD112012119DosensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d112012119_dosens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ktp_dosen');
            $table->string('nama_dosen');
            $table->string('alamat_dosen');
            $table->string('email_dosen');
            $table->string('notlp_dosen');
            $table->string('bidang_dosen');
            $table->string('jadwal_dosen');
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
        Schema::dropIfExists('d112012119_dosens');
    }
}
