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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_type_id')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->string('content');
            $table->dateTime('valid_from');
            $table->dateTime('valid_until');

            $table->timestamps();

            $table->unique(['content', 'valid_from', 'valid_until']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
