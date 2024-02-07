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
        Schema::table('customers', function (Blueprint $table) {
            $table->enum('email_quality', ['Green', 'Yellow', 'Red'])->default('Green')->after('correlation_id');
            $table->enum('phone_quality', ['0', '1'])->default('0')->after('email_quality');
            $table->enum('address_quality', ['0', '1'])->default('0')->after('phone_quality');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn(['email_quality', 'phone_quality', 'address_quality']);
        });
    }
};
