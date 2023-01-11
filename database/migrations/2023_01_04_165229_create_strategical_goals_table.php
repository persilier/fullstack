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
        Schema::create('strategical_goals', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('description');
            $table->year('start_year');
            $table->year('end_year');
            $table->integer('weight');
            $table->foreignId('company_id')->nullable()->constrained();
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
        Schema::dropIfExists('strategical_goals');
    }
};
