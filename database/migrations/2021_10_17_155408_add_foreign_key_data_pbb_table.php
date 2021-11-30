<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyDataPbbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_pbb', function (Blueprint $table) {
            $table->foreign('objek_pbb_id')->references('id')->on('objek_pbb')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_pbb', function (Blueprint $table) {
            $table->dropForeign(['objek_pbb_id']);
            $table->dropIndex('data_pbb_objek_pbb_id_foreign');
        });
    }
}
