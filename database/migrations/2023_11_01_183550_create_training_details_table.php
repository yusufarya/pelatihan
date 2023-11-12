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
        Schema::create('training_details', function (Blueprint $table) {
            $table->id();
            $table->char('initials', 10);
            $table->unsignedBigInteger('training_id')->nullable(false);
            $table->foreign('training_id')->on('trainings')->references('id');
            $table->string('title', 30);
            $table->string('description', 200);
            $table->date('date');
            $table->double('price');
            $table->text('images')->nullable();
            $table->enum('is_active', ["Y", "N"])->default('Y');
            $table->dateTime('created_on')->nullable();
            $table->string('created_by', 50)->nullable();
            $table->dateTime('updated_on')->nullable();
            $table->string('updated_by', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_details');
    }
};
