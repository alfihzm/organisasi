<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_dpc', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campuses_id')->constrained('campuses');
            $table->string('ketua')->nullable();
            $table->string('wakil_ketua')->nullable();
            $table->string('sekretaris_satu')->nullable();
            $table->string('sekretaris_dua')->nullable();
            $table->string('bendahara_satu')->nullable();
            $table->string('bendahara_dua')->nullable();
            $table->string('koor_rsdm')->nullable();
            $table->string('koor_kominfo')->nullable();
            $table->string('koor_pendidikan')->nullable();
            $table->string('koor_litbang')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
