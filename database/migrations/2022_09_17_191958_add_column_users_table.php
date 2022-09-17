<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->boolean('admin_chk')->default(0)->after('password'); //これを追加
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('admin_chk'); //これを追加
        });
    }
}
