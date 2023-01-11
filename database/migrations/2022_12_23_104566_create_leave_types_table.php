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
        Schema::create('leave_types', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('name');
            $table->mediumText('description');
            $table->boolean('earned_leave')->default(false);
            $table->boolean('carry_forward')->default(false);
            $table->integer('number_days')->default(0);
            $table->integer('max')->default(0);
            $table->boolean('status')->default(false);
            $table->enum('applicable', ['male','female','anyone'])->default('anyone');
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
        Schema::dropIfExists('leave_types');
    }
};
