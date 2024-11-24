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
		Schema::create('site_configs', function(Blueprint $table) {
            $table->increments('id');
            $table->text('value')->nullable();
            $table->tinyInteger('is_active')->nullable()->default(1);
            $table->string('type', 64)->nullable()->default('text');
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
		Schema::drop('site_configs');
	}
};
