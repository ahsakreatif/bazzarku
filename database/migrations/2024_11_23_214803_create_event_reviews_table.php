<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('event_reviews', function(Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id')->unsigned();
            $table->unsignedBigInteger('user_id');
            $table->text('review');
            $table->integer('rating');
            $table->timestamps();
		});

        Schema::table("event_reviews", function(Blueprint $table) {
            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('user_id')->references('id')->on('users');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('event_reviews');
	}
};
