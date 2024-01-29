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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')
            ->constrained()
            ->onUpdate('restrict')
            ->onDelete('restrict');
            $table->text('address');
            $table->string('city',100);
            $table->string('zipcode',50);
            $table->foreignId('country_id') ->constrained()
            ->onUpdate('restrict')
            ->onDelete('restrict');
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
        Schema::dropIfExists('addresses');
    }
};
