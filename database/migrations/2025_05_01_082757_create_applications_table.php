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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->default('null');
            $table->string('email')->nullable()->default('null');
            $table->string('phone')->nullable()->default('null');
            $table->string('address')->nullable()->default('null');
            $table->string('note')->nullable()->default('null');

            $table->foreignId('event_id')->constrained('events');
            $table->string('payment_proof')->nullable();
            $table->string('status')->default('pending');
            $table->dateTime('payment_datetime')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
