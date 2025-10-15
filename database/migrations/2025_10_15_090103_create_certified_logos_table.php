<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('certified_logos', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(); // optional, for alt text
            $table->string('image'); // store path in /storage
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('certified_logos');
    }
};
