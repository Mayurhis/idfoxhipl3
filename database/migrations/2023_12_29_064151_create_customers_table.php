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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->foreignId('brand_id')
            ->constrained()
            ->onUpdate('restrict')
            ->onDelete('restrict');
            $table->string('first_name',255);
            $table->string('last_name',255);
            $table->date('dob');
            $table->integer('mobile_number');
            $table->string('email',255);
            $table->enum('term_condition',['0','1'])->default('0');
            $table->enum('verification_status',['0','1'])->default('0');
            $table->enum('status',['active','suspended','pending'])->default('pending');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
