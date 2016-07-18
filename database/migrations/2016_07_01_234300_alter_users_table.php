<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('users', 'twitter_id')) {
            Schema::table('users', function ($table) {
                $table->string('twitter_id')
                    ->after('google_id')
                    ->nullable();
            });
        }

        if (!Schema::hasColumn('users', 'facebook_id')) {
            Schema::table('users', function ($table) {
                $table->string('facebook_id')
                    ->after('twitter_id')
                    ->nullable();
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
        if (Schema::hasColumn('users', 'twitter_id')) {
            Schema::table('users', function ($table) {
                $table->dropColumn('twitter_id');
            });
        }

        if (Schema::hasColumn('users', 'facebook_id')) {
            Schema::table('users', function ($table) {
                $table->dropColumn('facebook_id');
            });
        }
    }
}
