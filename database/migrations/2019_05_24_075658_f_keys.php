<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::enableForeignKeyConstraints();
        if (Schema::hasTable('article')) {
			if (Schema::hasColumn('article', 'id_category')) {
				Schema::table('article', function (Blueprint $table) {
					$table->foreign('id_category')->references('id_category')->on('category')->onDelete('cascade');
					
				});
			}
    	}
		
		if (Schema::hasTable('game_category')) {
			if (Schema::hasColumn('game_category', 'id_category')) {
				Schema::table('game_category', function(Blueprint $table) {
					$table->foreign('id_category')->references('id_category')->on('category')->onDelete('cascade');
				});
			}
			if (Schema::hasColumn('game_category', 'id_article')) {
				Schema::table('game_category', function(Blueprint $table) {
					$table->foreign('id_article')->references('id_article')->on('article')->onDelete('cascade');
				});
			}
		}
		
		
		if (Schema::hasTable('news')) {
			if (Schema::hasColumn('news', 'id_article')) {
				Schema::table('news', function(Blueprint $table) {
					$table->foreign('id_article')->references('id_article')->on('article')->onDelete('cascade');
				});
			}
		}
		
		if (Schema::hasTable('game_platform')) {
			if (Schema::hasColumn('game_platform', 'id_article')) {
				Schema::table('game_platform', function(Blueprint $table) {
					$table->foreign('id_article')->references('id_article')->on('article')->onDelete('cascade');
				});
			}
			if (Schema::hasColumn('game_platform', 'id_platform')) {
				Schema::table('game_platform', function(Blueprint $table) {
					$table->foreign('id_platform')->references('id_platform')->on('platform')->onDelete('cascade');
				});
			}
		}
		
		if (Schema::hasTable('review')) {
			if (Schema::hasColumn('review', 'id_article')) {
				Schema::table('review', function(Blueprint $table) {
					$table->foreign('id_article')->references('id_article')->on('article')->onDelete('cascade');
				});
			}
			if (Schema::hasColumn('review', 'id_user')) {
				Schema::table('review', function(Blueprint $table) {
					$table->foreign('id_user')->references('id_user')->on('user')->onDelete('cascade');
				});
			}
		}
		
		if (Schema::hasTable('application')) {
			if (Schema::hasColumn('application', 'id_article')) {
				Schema::table('application', function(Blueprint $table) {
					$table->foreign('id_article')->references('id_article')->on('article')->onDelete('cascade');
				});
			}
			if (Schema::hasColumn('application', 'id_user')) {
				Schema::table('application', function(Blueprint $table) {
					$table->foreign('id_user')->references('id_user')->on('user')->onDelete('cascade');
				});
			}
		}
	}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign('article_id_category_foreign');
		$table->dropForeign('game_category_id_category_foreign');
		$table->dropForeign('game_category_id_article_foreign');
		$table->dropForeign('news_id_article_foreign');
		$table->dropForeign('game_platform_id_article_foreign');
		$table->dropForeign('game_platform_id_platform_foreign');
		$table->dropForeign('review_id_article_foreign');
		$table->dropForeign('review_id_user_foreign');
		$table->dropForeign('application_id_article_foreign');
		$table->dropForeign('application_id_user_foreign');
    }
}
