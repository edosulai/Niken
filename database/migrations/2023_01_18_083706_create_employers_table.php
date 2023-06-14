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
            $table->string('nik', 8);
            $table->string('nama', 25);
            $table->string('p_area', 25);
            $table->string('personnel_subarea', 25);
            $table->string('bagian', 40);
            $table->string('job_group', 25);
            $table->string('posisi_kerja', 50);
            // $table->string('status', 25);
            $table->enum('jenis_kelamin', ['Male', 'Female']);
            $table->string('edu_establishment', 25);
            $table->date('tgl_lahir');
            $table->date('tgl_masuk');
            // $table->integer('jarak_alamat');
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
