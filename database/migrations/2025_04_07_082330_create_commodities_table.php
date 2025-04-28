<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('commodity_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('picture')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        Schema::create('commodities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('picture')->nullable();
            $table->float('price')->default(0);
            $table->string('location')->nullable();
            $table->string('status')->default('draft');
            $table->unsignedBigInteger('commodity_type_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });

        Schema::table('commodities', function (Blueprint $table) {
            $table->foreign('commodity_type_id')->references('id')->on('commodity_types');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commodities');
        Schema::dropIfExists('commodity_types');
    }
};
