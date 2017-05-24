<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsAndEditUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('code')->nullable()->change();
            $table->string('position')->nullable()->change();
            $table->string('office_id')->nullable()->change();
            $table->string('token', 100)->nullable();
            $table->string('refresh_token', 100)->nullable();
            $table->string('expired_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('code')->nullable(false)->change();
            $table->string('position')->nullable(false)->change();
            $table->string('office_id')->nullable(false)->change();
            $table->dropColumn(['token', 'refresh_token', 'expired_time']);
        });
    }
}
