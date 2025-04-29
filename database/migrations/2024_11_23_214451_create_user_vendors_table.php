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
            $table->string('phone_number')->nullable()->default(null);
            $table->text('description')->nullable()->default(null);
            $table->string('picture')->nullable()->default(null);
            $table->float('avg_rating')->nullable()->default(null);
            $table->string('location')->nullable()->default(null);
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
