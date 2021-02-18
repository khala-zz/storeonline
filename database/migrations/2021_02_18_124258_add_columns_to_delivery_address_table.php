<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToDeliveryAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('delivery_address', function (Blueprint $table) {
            
            $table -> string('name');
            $table -> string('users_email');
            $table -> string('address');
            $table -> string('city');
            $table -> integer('users_id');
            $table -> string('state');
            $table -> string('country');
            $table -> string('pincode');
            $table -> string('mobile');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('delivery_address', function (Blueprint $table) {
            //
        });
    }
}
