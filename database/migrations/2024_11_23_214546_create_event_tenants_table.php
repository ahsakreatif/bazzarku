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
		Schema::create('event_tenants', function(Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('tenant_id');
            $table->string('status')->default('pending');
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->string('payment_proof')->nullable();
            $table->string('message')->nullable();
            $table->timestamps();
		});

        Schema::table("event_tenants", function(Blueprint $table) {
            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('tenant_id')->references('id')->on('user_tenants');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('event_tenants');
	}
};
