<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Application extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application', function(Blueprint $table) {
			$table->bigInteger('id_application');
			$table->bigInteger('id_user')->unsigned()->index();
			$table->bigInteger('id_article')->unsigned()->index();
			$table->text('message');
			$table->char('a_date', 10);
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
        Schema::drop('application');
    }
}
