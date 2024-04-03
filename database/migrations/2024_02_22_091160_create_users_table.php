<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {

            $table->id();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('gender_id')->default('0')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('city_id')->default(0)->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('type_id')->default(0)->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->string('first_name');
            $table->string('sur_name');
            $table->string('telephone_number')->nullable();
            $table->string('street_name');
            $table->string('house_number');
            $table->string('email');
            $table->string('password');
            $table->date('birthdate');
            $table->boolean('active')->default(true);
            $table->rememberToken();
            $table->timestamps();

            $table->unique(['first_name', 'sur_name', 'email']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
