<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class User extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function(Blueprint $table) {
			$table->bigInteger('id_user')->unsigned()->index();
			$table->string('name', 64);
			$table->string('email', 255);
			$table->string('profile_picture', 255);
			$table->string('password', 255);
			$table->char('birthday', 10);
			$table->string('steam_name', 64)->nullable();
			$table->boolean('newsletter');
			$table->tinyInteger('status');
			$table->char('r_date', 10);
			$table->boolean('active');
			$table->timestamps();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
