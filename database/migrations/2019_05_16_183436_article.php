<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Article extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function(Blueprint $table) {
			$table->bigInteger('id_article')->unsigned()->index();
			$table->bigInteger('id_category')->unsigned()->index();
			$table->string('name_de', 255);
			$table->string('name_en', 255);
			$table->double('price', 6, 2);
			$table->char('release_date', 10)->nullable();
			$table->text('description_de');
			$table->text('description_en');
			$table->boolean('availability');
			$table->text('pictures');
			$table->text('game_language')->nullable();
			$table->text('audio_language')->nullable();
			$table->text('video_link')->nullable();
			$table->string('teaser_de', 255);
			$table->string('teaser_en', 255);
			$table->text('features_de')->nullable();
			$table->text('features_en')->nullable();
			$table->text('age_rating')->nullable();
			$table->text('content_rating')->nullable();
			$table->text('system_requirements')->nullable();
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
        Schema::drop('article');
    }
}
