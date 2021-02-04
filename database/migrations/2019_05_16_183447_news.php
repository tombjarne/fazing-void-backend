<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class News extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function(Blueprint $table) {
			$table->bigInteger('id_news');
			$table->bigInteger('id_article')->unsigned()->index();
			$table->char('release_date', 10);
			$table->string('version', 8);
			$table->text('patch_notes_de');
			$table->text('patch_notes_en');
			$table->text('pictures');
			$table->char('c_date', 10);
			$table->boolean('active');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('news');
    }
}
