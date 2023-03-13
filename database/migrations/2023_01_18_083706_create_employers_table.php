<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('nama');
            $table->string('p_area');
            $table->string('personnel_subarea');
            $table->string('bagian');
            $table->string('job_group');
            $table->string('posisi_kerja');
            $table->string('status');
            $table->enum('jenis_kelamin', ['Male', 'Female']);
            $table->string('edu_establishment');
            $table->date('tgl_lahir');
            $table->date('tgl_masuk');
            $table->integer('jarak_alamat');
            $table->integer('kinerja');
            $table->integer('ketepatan_waktu');
            $table->integer('komunikasi');
            $table->integer('kreatifitas');
            $table->integer('kehadiran');
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
        Schema::dropIfExists('statuses');
    }
};
