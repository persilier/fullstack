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
        Schema::create('tactical_goals', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('description');
            $table->enum('type',['trimester','semester'])->default('trimester');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('weight');
            $table->foreignId('department_id')->constrained()->cascadeOnDelete();
            $table->foreignId('strategical_goal_id')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('responsible');
            $table->foreign('responsible')->references('id')->on('users');
            $table->enum('status', ['in_progress','complete','not_started'])->default('not_started');
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
        Schema::dropIfExists('tactical_goals');
    }
};
