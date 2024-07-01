<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->unsignedBigInteger('personal_data_id')->nullable();

            // Opcional: agregar la clave foránea
            $table->foreign('personal_data_id')->references('id')->on('personal_data')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign(['personal_data_id']);
            $table->dropColumn('personal_data_id');
        });
    }

};
