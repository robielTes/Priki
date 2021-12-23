<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToOpinionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('opinions', function (Blueprint $table) {
            $table->foreign(['practice_id'], 'fk_opinion_about')->references(['id'])->on('practices')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['user_id'], 'fk_opinions_fusers1')->references(['id'])->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('opinions', function (Blueprint $table) {
            $table->dropForeign('fk_opinion_about');
            $table->dropForeign('fk_opinions_fusers1');
        });
    }
}
