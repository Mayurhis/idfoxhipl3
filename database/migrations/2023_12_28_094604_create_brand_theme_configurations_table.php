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
        Schema::create('brand_theme_configurations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')
            ->constrained()
            ->onUpdate('restrict')
            ->onDelete('cascade');
            $table->string('domain',255);
            $table->enum('display_name',['0','1'])->default('0');
            $table->enum('display_logo',['0','1'])->default('0');
            $table->enum('theme',['dark','light'])->default('light');
            $table->string('accent_color',10);
            $table->enum('button_color',['dark','light'])->default('light');
            $table->bigInteger("defaul_language");
            $table->enum('approval_method',['manual','automatic','zignsec'])->default('manual');
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
        Schema::dropIfExists('brand_theme_configurations');
    }
};
