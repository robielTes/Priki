<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePracticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practices', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('description', 5000);
            $table->integer('domain_id')->index('fk_topics_themes_idx');
            $table->integer('publicationstate_id')->index('fk_topics_states1_idx');
            $table->integer('user_id')->index('fk_practice_submitter_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('practices');
    }
}
