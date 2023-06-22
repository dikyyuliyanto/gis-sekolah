<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sekolah', function (Blueprint $table) {
            $table->id('id_sekolah')->unsigned()->length(16);
            $table->foreignId('id_kecamatan')->nullable()->references('id_kecamatan')->on('kecamatan');
            $table->string('nama_sekolah', 30);
            $table->text('alamat')->nullable();
            $table->text('website')->nullable();
            $table->text('jenis_sekolah')->nullable();
            $table->integer('jumlah_ppdb')->nullable();
            $table->text('deskripsi')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sekolah');
    }
};
