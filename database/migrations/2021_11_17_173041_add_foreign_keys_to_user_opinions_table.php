<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUserOpinionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_opinions', function (Blueprint $table) {
            $table->foreign(['opinion_id'], 'fk_fusers_has_opinions_opinions1')->references(['id'])->on('opinions')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['user_id'], 'fk_users_has_opinions_user')->references(['id'])->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_opinions', function (Blueprint $table) {
            $table->dropForeign('fk_fusers_has_opinions_opinions1');
            $table->dropForeign('fk_users_has_opinions_user');
        });
    }
}
