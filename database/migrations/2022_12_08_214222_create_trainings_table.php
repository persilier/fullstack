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
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('trainer_id')->nullable();
            $table->unsignedBigInteger('training_list_id')->nullable();
            $table->text('description');
            $table->date('start_date');
            $table->date('end_date');
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null');
            $table
                ->foreign('trainer_id')
                ->references('id')
                ->on('trainers')
                ->onDelete('set null');
            $table
                ->foreign('training_list_id')
                ->references('id')
                ->on('training_lists')
                ->onDelete('set null');
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
        Schema::dropIfExists('trainings');
    }
};
