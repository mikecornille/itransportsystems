<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer_name');
            $table->string('customer_address');
            $table->string('customer_city');
            $table->string('customer_state');
            $table->string('customer_zip');
            $table->string('customer_contact');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->string('customer_fax');
            $table->string('carrier_name');
            $table->string('carrier_address');
            $table->string('carrier_city');
            $table->string('carrier_state');
            $table->string('carrier_zip');
            $table->string('carrier_contact');
            $table->string('carrier_email');
            $table->string('carrier_phone');
            $table->string('carrier_fax');
            $table->string('carrier_driver_name');
            $table->string('carrier_driver_cell');
            $table->string('pick_company');
            $table->string('pick_address');
            $table->string('pick_city');
            $table->string('pick_state');
            $table->string('pick_zip');
            $table->string('pick_contact');
            $table->string('pick_phone');
            $table->string('pick_email');
            $table->string('pick_date');
            $table->string('pick_time');
            $table->string('pick_status');
            $table->string('delivery_company');
            $table->string('delivery_address');
            $table->string('delivery_city');
            $table->string('delivery_state');
            $table->string('delivery_zip');
            $table->string('delivery_contact');
            $table->string('delivery_phone');
            $table->string('delivery_email');
            $table->string('delivery_date');
            $table->string('delivery_time');
            $table->string('delivery_status');
            $table->string('po_number');
            $table->string('ref_number');
            $table->string('bol_number');
            $table->string('created_by');
            $table->string('its_group');
            $table->string('amount_due');
            $table->string('carrier_rate');
            $table->string('billed_date');
            $table->string('approved_carrier_invoice');
            $table->text('commodity');
            $table->text('special_ins');
            $table->string('trailer_type');
            $table->text('internal_notes');
            $table->text('add_stops');
            $table->text('invoice_notes');
            $table->text('update_customer_message');
            $table->string('rate_con_creation_date');
            $table->string('signed_rate_con');
            $table->string('quick_status_notes');
            $table->string('vendor_invoice_number');
            $table->string('vendor_invoice_date');
            $table->string('remit_name');
            $table->string('remit_address');
            $table->string('remit_city');
            $table->string('remit_state');
            $table->string('remit_zip');
            $table->text('carrier_message');
            $table->string('internal_email_address');
            $table->text('internal_message');
            $table->string('creation_date');
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
        Schema::dropIfExists('loads');
    }
}
