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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table
                ->enum('type', ['SARL', 'SURL', 'SA'])
                ->default('SARL');
            $table->string('trading_name')->nullable();
            $table->string('registration_no')->nullable();
            $table->string('ifu')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('tax_no')->nullable();
            $table->string('company_logo')->nullable();
            $table->tinyInteger('is_active')->nullable();
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
        Schema::dropIfExists('companies');
    }
};
