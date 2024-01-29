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
        Schema::create('workers', function (Blueprint $table) {
        $table->id();
        $table->string('username')->unique();
        $table->string('name');
        $table->string('last_name');
        $table->string('email')->unique();
        $table->string('password');
        $table->integer('age');
        $table->integer('cin');
        $table->string('phone_number');
        $table->string('rank');
        $table->string('rank_code');
        $table->string('department');
        $table->integer('requests_number');
        $table->integer('pr_number');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workers');
    }
};
