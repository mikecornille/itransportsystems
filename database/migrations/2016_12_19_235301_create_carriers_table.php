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
            $table->string('company')->nullable();
            $table->string('contact')->nullable();
            $table->integer('mc_number')->nullable();
            $table->integer('dot_number')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('driver_name')->nullable();
            $table->string('driver_phone')->nullable();
            $table->string('cargo_exp')->nullable();
            $table->string('cargo_amount')->nullable();
            $table->string('bc_contract')->nullable();
            $table->smallInteger('flatbed')->nullable();
            $table->smallInteger('stepdeck')->nullable();
            $table->smallInteger('conestoga')->nullable();
            $table->smallInteger('hot_shot')->nullable();
            $table->smallInteger('van')->nullable();
            $table->smallInteger('power')->nullable();
            $table->smallInteger('lowboy')->nullable();
            $table->smallInteger('landoll')->nullable();
            $table->smallInteger('towing')->nullable();
            $table->smallInteger('auto_carrier')->nullable();
            $table->smallInteger('straight_truck')->nullable();
            $table->string('remit_name')->nullable();
            $table->string('remit_address')->nullable();
            $table->string('remit_city')->nullable();
            $table->string('remit_state')->nullable();
            $table->string('remit_zip')->nullable();
            $table->text('load_info')->nullable();
            $table->text('permanent_notes')->nullable();
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
