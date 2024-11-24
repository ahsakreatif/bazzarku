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
		Schema::create('user_tenants', function(Blueprint $table) {
            $table->increments('id');
            $table->string('tenant_name');
            $table->string('phone_number');
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('picture')->nullable();
            $table->text('profile')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('user_id');
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
		Schema::drop('user_tenants');
	}
};
