<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPublicationstatetransitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('publicationstatetransitions', function (Blueprint $table) {
            $table->foreign(['from_id'], 'fk_publicationstatetransitions_publicationstates1')->references(['id'])->on('publicationstates')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['to_id'], 'fk_publicationstatetransitions_publicationstates2')->references(['id'])->on('publicationstates')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('publicationstatetransitions', function (Blueprint $table) {
            //
        });
    }
}