<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('posts', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('category_id')->unsigned();
			$table->string('name', 128); // Laravel 5.5
			$table->string('slug', 128)->unique(); // Laravel-5-5
			$table->mediumText('excerpt')->nullable();
			$table->text('body');
			$table->enum('status', ['PUBLISHED', 'DRAFT'])->default('DRAFT');
			$table->string('file')->required();
			$table->timestamps();

			// Relations
			$table->foreign('user_id')->references('id')->on('users')
				->onDelete('cascade')
				->onUpdate('cascade');

			$table->foreign('category_id')->references('id')->on('categories')
				->onDelete('cascade')
				->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('posts');
	}
}
