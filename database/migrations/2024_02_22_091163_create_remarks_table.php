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
        Schema::create('remarks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('child_id');
            $table->foreignId('remarker_id');
            $table->string('note');
            $table->boolean('is_intern')->default(true);
            $table->dateTime('date');
            $table->boolean('active')->default(true);
            $table->timestamps();
            $table->unique(['child_id', 'remarker_id', 'date']);
            $table->foreign('child_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('remarker_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('remarks');
    }
};
