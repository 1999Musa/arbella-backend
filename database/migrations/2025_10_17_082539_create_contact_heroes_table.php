<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('contact_heroes', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable(); // stores banner image path
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_heroes');
    }
};
