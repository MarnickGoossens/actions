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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('course_id')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->float('discount')->nullable();
            $table->unsignedInteger('payment_period');
            $table->dateTime('registration_date');
            $table->string('structured_message');
            $table->boolean('is_cancelled')->default(false)->nullable();
            $table->boolean('active')->default(true);

            $table->timestamps();
            $table->unique(['user_id', 'course_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
