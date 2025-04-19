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
		Schema::create('user_vendors', function(Blueprint $table) {
            $table->id();
            $table->string('vendor_name');
            $table->string('phone_number');
            $table->text('description')->nullable();
            $table->string('picture')->nullable();
            $table->float('avg_rating')->default(0);
            $table->string('location')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('user_id');
		});

        Schema::table('user_vendors', function(Blueprint $table) {
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
		Schema::drop('user_vendors');
	}
};
