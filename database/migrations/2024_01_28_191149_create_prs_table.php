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
        Schema::create('prs', function (Blueprint $table) {
            $table->id();
            $table->integer('PR_id')->nullable();
            $table->string('PR_line_id')->nullable();
            $table->string('PR_reference')->nullable();
            $table->string('sentBy')->nullable();
            $table->string('project_name')->nullable();
            $table->string('project_code')->nullable();
            $table->string('division_name')->nullable();
            $table->string('cost_center')->nullable();
            $table->string('direct_supervisor')->nullable();
            $table->string('direct_supervisor_signature')->nullable();
            $table->string('DH')->nullable();
            $table->string('BOD1')->nullable();
            $table->string('BOD2')->nullable();
            $table->string('BOD1_signature')->nullable();
            $table->string('BOD2_signature')->nullable();
            $table->date('BOD1_approval_date')->format('Y-m-d H:i:s')->nullable();
            $table->date('BOD2_approval_date')->format('Y-m-d H:i:s')->nullable();
            $table->string('quotation')->nullable();
            $table->string('quotation_approval1')->nullable();
            $table->string('quotation_approval2')->nullable();
            $table->date('quotation_approval1_date')->format('Y-m-d H:i:s')->nullable();
            $table->date('Buotation_approval2_date')->format('Y-m-d H:i:s')->nullable();
            $table->date('approval_date')->format('Y-m-d H:i:s')->nullable();
            $table->string('description')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('unit')->nullable();
            $table->string('SRDR')->nullable();
            $table->string('GCR')->nullable();
            $table->string('explanation')->nullable();
            $table->string('DAF_approval')->nullable();
            $table->string('DAF_approval_date')->format('Y-m-d H:i:s')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prs');
    }
};
