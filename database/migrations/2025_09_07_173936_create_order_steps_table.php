<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('order_steps', function (Blueprint $table) {
        $table->id();
        $table->string('step'); // e.g. "01"
        $table->string('title'); // required
        $table->text('description')->nullable(); // optional
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_steps');
    }
};
