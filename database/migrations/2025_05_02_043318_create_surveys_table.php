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
        Schema::create('surveys', function (Blueprint $table) {
            $table->id('survey_id');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->tinyInteger('rating')->unsigned();
            $table->text('comment')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveys');
    }
};
