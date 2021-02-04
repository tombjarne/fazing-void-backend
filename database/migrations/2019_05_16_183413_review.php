<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Review extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review', function(Blueprint $table) {
			$table->bigInteger('id_review')->unsigned()->index();
			$table->bigInteger('id_user')->unsigned()->index();
			$table->bigInteger('id_article')->unsigned()->index();
			$table->integer('rating');
			$table->text('review');
			$table->char('language', 5);
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
        Schema::drop('review');
    }
}
