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
        Schema::create('custom_leave_policies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('num_days');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('leave_type_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('leave_type_id')->references('id')->on('leave_types')->onDelete('set null');
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
        Schema::dropIfExists('custom_leave_policies');
    }
};
