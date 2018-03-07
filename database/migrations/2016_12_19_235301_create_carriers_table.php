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
            $table->string('trailer_type_1')->nullable();
            $table->string('trailer_type_2')->nullable();
            $table->string('trailer_type_3')->nullable();
            $table->string('remit_name')->nullable();
            $table->string('remit_address')->nullable();
            $table->string('remit_city')->nullable();
            $table->string('remit_state')->nullable();
            $table->string('remit_zip')->nullable();
            $table->text('load_info')->nullable();
            $table->text('permanent_notes')->nullable();
            $table->string('load_route')->nullable();
            $table->string('current_carrier_rate')->nullable();
            $table->string('current_trailer_type')->nullable();
            $table->string('current_city_location')->nullable();
            $table->string('current_miles_from_pick')->nullable();
            $table->string('delivery_schedule')->nullable();
            $table->string('email_colleague_carrier')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('account_name')->nullable();
            $table->string('routing_number')->nullable();
            $table->string('account_number')->nullable();
            $table->string('account_type')->nullable();
            $table->string('accounting_email')->nullable();
            $table->string('accounting_phone')->nullable();
            $table->string('insurance_company_email')->nullable();
            $table->string('security')->nullable();
            $table->string('ach_token')->nullable();
            //$table->string('active')->nullable();
            //$table->string('google_carrier')->nullable();
            // $table->string('oos_driver_national')->nullable();
            //     $table->string('oos_driver_company')->nullable();
            //     $table->string('oos_vehicle_national')->nullable();
            //     $table->string('oos_vehicle_company')->nullable();                         
            //     $table->string('allowed_to_operate')->nullable();
            //     $table->string('operation_type')->nullable();                         
            //     $table->string('crashes')->nullable();
            //     $table->string('fatal_crashes')->nullable();                          
            //     $table->string('number_of_drivers')->nullable();
            //     $table->string('number_of_power')->nullable();
            //$table->string('fmcsa_time')->nullable();
            $table->timestamps();
        });

        DB::update("ALTER TABLE carriers AUTO_INCREMENT = 36000;");
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
