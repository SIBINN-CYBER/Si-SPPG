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
        Schema::create('menu', function (Blueprint $table) {
            $table->id();
            $table->string('namamenu');
            $table->date('tanggal')->nullable();
            $table->string('foto')->nullable();
            $table->string('menu_utama')->nullable();
            $table->string('lauk')->nullable();
            $table->string('saus')->nullable();
            $table->string('dessert')->nullable();
            $table->string('energi_besar')->nullable();
            $table->string('protein_besar')->nullable();
            $table->string('lemak_besar')->nullable();
            $table->string('karbo_besar')->nullable();
            $table->string('energi_kecil')->nullable();
            $table->string('protein_kecil')->nullable();
            $table->string('lemak_kecil')->nullable();
            $table->string('karbo_kecil')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu');
    }
};
