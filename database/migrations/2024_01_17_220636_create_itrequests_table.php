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
            $table->string('description1');
            $table->string('description2');
            $table->string('description3');
            $table->string('description4');
            $table->string('quantity1');
            $table->string('quantity2');
            $table->string('quantity3');
            $table->string('quantity4');
            $table->string('remarks1');
            $table->string('remarks2');
            $table->string('remarks3');
            $table->string('remarks4');
            $table->binary('signature'); //image signature
            $table->boolean('DH_approval')->default(false);
            $table->date('DH_approval_date');
            $table->boolean('BOD1_approval')->default(false);
            $table->date('BOD1_approval_date');
            $table->boolean('AMLC_approval')->default(false);
            $table->date('AMLC_approval_date');
            $table->boolean('AMLC_found')->default(false);
            $table->date('AMLC_found_date');
            $table->string('price');
            $table->boolean('BOD2_approval')->default(false);
            $table->date('BOD2_approval_date');
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
