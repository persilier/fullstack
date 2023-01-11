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
        Schema::create('awards', function (Blueprint $table) {
            $table->id();
            $table->mediumText('award_information')->nullable();
            $table->date('award_date');
            $table->string('gift', 40)->nullable();
            $table->string('cash', 40)->nullable();
            $table->string('award_photo')->nullable();
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('department_id')->constrained('departments');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('award_type_id')->constrained('award_types');
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
        Schema::dropIfExists('awards');
    }
};
