<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Category extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function(Blueprint $table) {
			$table->bigInteger('id_category')->unsigned()->index();
			$table->bigInteger('id_parent')->nullable();
			$table->string('name_de', 32);
			$table->string('name_en', 32);
			$table->integer('type');
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
        Schema::drop('category');
    }
}
