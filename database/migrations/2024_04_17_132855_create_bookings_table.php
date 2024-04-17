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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('junkshop_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->string('status');
            $table->string('user_contact');
            $table->string('user_address');
            $table->float('user_latitude');
            $table->float('user_longitude');
            $table->text('description');
            $table->timestamp('schedule')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
