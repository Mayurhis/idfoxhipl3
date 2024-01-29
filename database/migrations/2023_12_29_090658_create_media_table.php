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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('uploadable_type',255);
            $table->bigInteger('uploadable_id');
            $table->string('path',255);
            $table->string('type',255);
            $table->enum('upload_type',['photo_id_image','liveliness_image','address_proof_image'])->nullable();
            $table->foreignId("upload_option_id") ->constrained()
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
        Schema::dropIfExists('media');
    }
};
