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
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->text('summary')->nullable();
            $table->longText('description')->nullable();
            $table->unsignedBiginteger('company_id')->nullable();
            $table->unsignedBiginteger('department_id')->nullable();
            $table->unsignedBigInteger('added_by')->nullable();
            $table->boolean('is_notify')->default(true);
            $table
                ->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->onDelete('set null');
            $table
                ->foreign('department_id')
                ->references('id')
                ->on('departments')
                ->onDelete('set null');
            $table
                ->foreign('added_by')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('announcements');
    }
};
