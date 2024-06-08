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
        Schema::create('ourschef', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->text('designation');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('instagram');
            $table->string('image_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ourchef');
    }
};
