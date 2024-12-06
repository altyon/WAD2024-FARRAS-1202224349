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
        Schema::create('student', function (Blueprint $table) {
            $table->integer('nim')->unique();
            $table->string('student_name');
            $table->string('email')->unique();
            $table->string('major');
            $table->integer('dosen_id');
            $table->timestamps();

            $table->unsignedBigInteger('dosen_id');
            $table->foreign('dosen_id')->references('id')->on('lecturer')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student');
    }
};
