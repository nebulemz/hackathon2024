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
        Schema::create('junkshop_rates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('junkshop_id')->constrained();
            $table->string('name');
            $table->decimal('price');
            $table->string('unit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('junkshop_rates');
    }
};
