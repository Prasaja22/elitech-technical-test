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
        Schema::create('table_upload', function (Blueprint $table) {
            $table->id();
            $table->text('caption'); // Menyimpan caption
            $table->string('media')->nullable(); // Menyimpan URL file media
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi dengan user
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_upload');
    }
};
