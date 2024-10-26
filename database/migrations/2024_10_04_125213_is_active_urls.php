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
        Schema::create('is_active_urls', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->boolean('is_active')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('is_active_urls', function (Blueprint $table) {
            $table->dropColumn('url');
            $table->dropColumn('is_active');
        });
    }
};