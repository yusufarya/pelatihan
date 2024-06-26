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
        Schema::create('participants', function (Blueprint $table) {
            $table->char('number', 20)->primary();
            $table->string('nik', 16)->nullable();;
            $table->string('fullname', 100);
            $table->char('username', 30)->unique('users_username_unique');
            $table->enum('gender', ["M", "F"]);
            $table->string('place_of_birth', 50)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('no_telp', 20)->nullable();
            $table->string('no_wa', 20)->nullable();
            $table->string('address')->nullable();
            $table->double('height')->nullable();
            $table->char('size_uniform', 5)->nullable();
            $table->string('religion', 20)->nullable();
            $table->string('material_status', 30)->nullable();
            $table->string('last_education', 30)->nullable();
            $table->year('graduation_year')->nullable();
            $table->string('sub_district', 100)->nullable();
            $table->string('village', 100)->nullable();
            $table->text('id_card')->nullable();
            $table->text('ak1')->nullable();
            $table->text('ijazah')->nullable();
            $table->text('image')->nullable();
            $table->string('email', 100)->unique('users_email_unique');
            $table->string('password');
            // $table->unsignedBigInteger('grade_id')->nullable(false);
            // $table->foreign('grade_id')->on('grades')->references('id');
            $table->enum('participant', ["Y", "N"])->default('Y');
            $table->enum('is_active', ["Y", "N"])->default('N');
            $table->dateTime('created_at')->nullable()->default(date('Y-m-d H:i:s'));
            $table->string('created_by', 50)->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->string('updated_by', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
