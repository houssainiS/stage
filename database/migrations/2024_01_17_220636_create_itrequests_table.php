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
        Schema::create('itrequests', function (Blueprint $table) {
            $table->id();
            $table->integer('requestor_id');
            $table->string('reference');
            $table->string('IT_ST')->nullable();
            $table->string('description1')->nullable();
            $table->string('description2')->nullable();
            $table->string('description3')->nullable();
            $table->string('description4')->nullable();
            $table->string('quantity1')->nullable();
            $table->string('quantity2')->nullable();
            $table->string('quantity3')->nullable();
            $table->string('quantity4')->nullable();
            $table->string('remarks1')->nullable();
            $table->string('remarks2')->nullable();
            $table->string('remarks3')->nullable();
            $table->string('remarks4')->nullable();
            $table->binary('signature')->nullable(); //image signature
            $table->boolean('DH_approval')->default(false);
            $table->date('DH_approval_date')->nullable();
            $table->boolean('BOD1_approval')->default(false);
            $table->date('BOD1_approval_date')->nullable();
            $table->boolean('AMLC_approval')->default(false);
            $table->date('AMLC_approval_date')->nullable();
            $table->boolean('AMLC_found')->default(false);
            $table->date('AMLC_found_date')->nullable();
            $table->string('price')->nullable();
            $table->boolean('BOD2_approval')->default(false);
            $table->date('BOD2_approval_date')->nullable();
            $table->boolean('AMLC_bought')->default(false);
            $table->date('AMLC_bought_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itrequests');
    }
};
