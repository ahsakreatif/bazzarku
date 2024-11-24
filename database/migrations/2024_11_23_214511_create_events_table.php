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
		Schema::create('events', function(Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('description')->nullable();
            $table->string('picture')->nullable();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->float('price')->default(0);
            $table->unsignedBigInteger('event_type_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
		});

        Schema::table('events', function(Blueprint $table) {
            $table->foreign('event_type_id')->references('id')->on('event_types');
            $table->foreign('user_id')->references('id')->on('users');
            $table->index('start_date');
            $table->index('end_date');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('events');
	}
};
