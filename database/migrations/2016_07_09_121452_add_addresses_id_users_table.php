<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAddressesIdUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('users', 'addresses_id')) {
            Schema::table('users', function ($table) {
                $table->integer('addresses_id')
                    ->after('id');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('users', 'addresses_id')) {
            Schema::table('users', function ($table) {
                $table->dropColumn('addresses_id');
            });
        }
    }
}
