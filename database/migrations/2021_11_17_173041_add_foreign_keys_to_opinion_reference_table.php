<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToOpinionReferenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('opinion_reference', function (Blueprint $table) {
            $table->foreign(['opinion_id'], 'fk_references_has_opinions_opinions2')->references(['id'])->on('opinions')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['reference_id'], 'fk_references_has_opinions_references2')->references(['id'])->on('references')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('opinion_reference', function (Blueprint $table) {
            $table->dropForeign('fk_references_has_opinions_opinions2');
            $table->dropForeign('fk_references_has_opinions_references2');
        });
    }
}
