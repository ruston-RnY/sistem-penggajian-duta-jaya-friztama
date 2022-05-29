<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->integer('karyawan_id');
            $table->integer('absensi_id');
            $table->integer('pinjaman_id')->nullable();
            $table->date('tanggal');
            $table->integer('bonus');
            $table->integer('upah_lembur');
            $table->integer('total_gaji');
            $table->integer('sisa_pinjaman');
            $table->softDeletes();
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
        Schema::dropIfExists('salaries');
    }
}
