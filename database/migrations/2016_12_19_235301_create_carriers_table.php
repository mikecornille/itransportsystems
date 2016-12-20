<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carriers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company');
            $table->string('contact');
            $table->integer('mc_number');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('phone');
            $table->string('fax');
            $table->string('email');
            $table->string('driver_name');
            $table->string('driver_phone');
            $table->string('cargo_exp');
            $table->string('cargo_amount');
            $table->string('bc_contract');
            $table->smallInteger('flatbed');
            $table->smallInteger('stepdeck');
            $table->smallInteger('conestoga');
            $table->smallInteger('hot_shot');
            $table->smallInteger('van');
            $table->smallInteger('power');
            $table->smallInteger('lowboy');
            $table->smallInteger('landoll');
            $table->smallInteger('towing');
            $table->smallInteger('auto_carrier');
            $table->smallInteger('straight_truck');
            $table->string('remit_name');
            $table->string('remit_address');
            $table->string('remit_city');
            $table->string('remit_state');
            $table->string('remit_zip');
            $table->text('internal_notes');
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
        Schema::dropIfExists('carriers');
    }
}
