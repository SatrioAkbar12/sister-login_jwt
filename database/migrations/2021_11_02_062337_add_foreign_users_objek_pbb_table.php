<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignUsersObjekPbbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_objek_pbb', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::table('users_objek_pbb', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['objek_pbb_id']);

            $table->dropIndex('users_objek_pbb_user_id_foreign');
            $table->dropIndex('users_objek_pbb_objek_pbb_id_foreign');
        });
    }
}
