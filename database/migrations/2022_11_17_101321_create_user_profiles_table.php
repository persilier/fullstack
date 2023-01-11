<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table
                ->string("employeeID")
                ->unique()
                ->nullable();
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string("father_name")->nullable();
            $table->string("mother_name")->nullable();
            $table->string("spouse_name")->nullable();
            $table->string("nationality")->nullable();
            $table->string('num_cnss')->nullable();
            $table
                ->string("blood_type")
                ->nullable();
            $table->string("id_name")->nullable();
            $table->string("id_number")->nullable();
            $table->string("phone_two", 30)->nullable();
            $table->string("emergency_contact", 30)->nullable();
            $table->enum("gender", ["male", "female"])->default("male");
            $table
                ->string("marital_status")
                ->nullable();
            $table->date("date_of_birth")->nullable();
            $table->string("ifu")->nullable();
            $table->date("date_hired")->nullable();
            $table->date("exit_date")->nullable();
            $table->integer('total_leave')->nullable();
            $table->integer('remaining_leave')->nullable();
            $table->boolean('active');
            $table->text('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_profiles');
    }
};
