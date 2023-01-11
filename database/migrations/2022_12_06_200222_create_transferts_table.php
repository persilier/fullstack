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
        Schema::create('transferts', function (Blueprint $table) {
            $table->id();
            $table->mediumText('description')->nullable();
            $table->UnsignedBiginteger('company_id')->nullable();
            $table->UnsignedBiginteger('from_department_id')->nullable();
            $table->UnsignedBiginteger('to_department_id')->nullable();
            $table->UnsignedBiginteger('user_id')->nullable();
            $table->date('transfer_date');

            $table
                ->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->onDelete('cascade');
            $table
                ->foreign('from_department_id')
                ->references('id')
                ->on('departments')
                ->onDelete('cascade');
            $table
                ->foreign('to_department_id')
                ->references('id')
                ->on('departments')
                ->onDelete('cascade');
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
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
        Schema::dropIfExists('transferts');
    }
};
