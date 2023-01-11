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
        Schema::create('tactical_indicators', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedBigInteger('tactical_goal_id');
            $table->foreign('tactical_goal_id')->references('id')->on('tactical_goals')->cascadeOnDelete();
            $table->integer('weight');
            $table->unsignedBigInteger('responsible');
            $table->foreign('responsible')->references('id')->on('users');
            $table->enum('status', ['in_progress','complete','not_started'])->default('not_started');
            $table->enum('trust', ['low','high','medium'])->default('low');
            $table->integer('init_value');
            $table->integer('target');
            $table->integer('current_value');
            $table->integer('progress');
            $table->mediumText('comments');
            $table->text('next_step');
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
        Schema::dropIfExists('tactical_indicators');
    }
};
