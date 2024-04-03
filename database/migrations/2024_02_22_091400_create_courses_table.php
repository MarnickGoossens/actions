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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId("location_id")->constrained()->restrictOnDelete()->cascadeOnUpdate();
            $table->string("name");
            $table->dateTime("date");
            $table->string("description");
            $table->integer("max_number");
            $table->string("photo")->nullable();
            $table->boolean("active")->default(true);
            $table->timestamps();
            $table->unique(['name', 'date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
