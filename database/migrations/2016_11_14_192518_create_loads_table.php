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
            $table->string('customer_name')->nullable();
            $table->string('customer_address')->nullable();
            $table->string('customer_city')->nullable();
            $table->string('customer_state')->nullable();
            $table->string('customer_zip')->nullable();
            $table->string('customer_contact')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('customer_phone')->nullable();
            $table->string('customer_fax')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('carrier_name')->nullable();
            $table->string('carrier_address')->nullable();
            $table->string('carrier_city')->nullable();
            $table->string('carrier_state')->nullable();
            $table->string('carrier_zip')->nullable();
            $table->string('carrier_contact')->nullable();
            $table->string('carrier_email')->nullable();
            $table->string('carrier_phone')->nullable();
            $table->string('carrier_fax')->nullable();
            $table->string('carrier_driver_name')->nullable();
            $table->string('carrier_driver_cell')->nullable();
            $table->string('pick_company')->nullable();
            $table->string('pick_address')->nullable();
            $table->string('pick_city')->nullable();
            $table->string('pick_state')->nullable();
            $table->string('pick_zip')->nullable();
            $table->string('pick_contact')->nullable();
            $table->string('pick_phone')->nullable();
            $table->string('pick_email')->nullable();
            $table->string('pick_date')->nullable();
            $table->string('pick_time')->nullable();
            $table->string('pick_status')->nullable();
            $table->string('delivery_company')->nullable();
            $table->string('delivery_address')->nullable();
            $table->string('delivery_city')->nullable();
            $table->string('delivery_state')->nullable();
            $table->string('delivery_zip')->nullable();
            $table->string('delivery_contact')->nullable();
            $table->string('delivery_phone')->nullable();
            $table->string('delivery_email')->nullable();
            $table->string('delivery_date')->nullable();
            $table->string('delivery_time')->nullable();
            $table->string('delivery_status')->nullable();
            $table->string('po_number')->nullable();
            $table->string('ref_number')->nullable();
            $table->string('bol_number')->nullable();
            $table->string('created_by')->nullable();
            $table->string('its_group')->nullable();
            $table->string('amount_due')->nullable();
            $table->string('carrier_rate')->nullable();
            $table->string('billed_date')->nullable();
            $table->string('approved_carrier_invoice')->nullable();
            $table->text('commodity')->nullable();
            $table->text('special_ins')->nullable();
            $table->string('trailer_type')->nullable();
            $table->text('internal_notes')->nullable();
            $table->text('add_stops')->nullable();
            $table->text('invoice_notes')->nullable();
            $table->text('update_customer_message')->nullable();
            $table->string('rate_con_creation_date')->nullable();
            $table->string('signed_rate_con')->nullable();
            $table->string('quick_status_notes')->nullable();
            $table->string('vendor_invoice_number')->nullable();
            $table->string('vendor_invoice_date')->nullable();
            $table->string('remit_name')->nullable();
            $table->string('remit_address')->nullable();
            $table->string('remit_city')->nullable();
            $table->string('remit_state')->nullable();
            $table->string('remit_zip')->nullable();
            $table->text('carrier_message')->nullable();
            $table->string('internal_email_address')->nullable();
            $table->text('internal_message')->nullable();
            $table->string('creation_date')->nullable();
            $table->string('rate_con_creator')->nullable();
            $table->string('trailer_for_search')->nullable();
            $table->string('carrier_mc')->nullable();
            $table->bigInteger('carrier_id')->nullable();
            $table->string('routing_number')->nullable();
            $table->string('account_number')->nullable();
            $table->string('account_type')->nullable();
            $table->string('account_name')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('paid_amount_from_customer')->nullable();
            $table->string('payment_method_from_customer')->nullable();
            $table->string('ref_or_check_num_from_customer')->nullable();
            $table->string('deposit_date')->nullable();
            $table->string('vendor_check_number')->nullable();
            $table->string('carrierPayStatus')->nullable();
            $table->string('customerPayStatus')->nullable();
            $table->string('totalCheckAmountFromCustomer')->nullable();
            $table->string('accounting_email')->nullable();
            $table->string('upload_date')->nullable();
            $table->timestamps();
            $table->string('cleared')->nullable();
            $table->string('cleared_date')->nullable();
            $table->string('quick_pay_flag', 10)->nullable();
            $table->string('customer_balanced', 10)->nullable();
            $table->string('carrier_balanced', 10)->nullable();
            $table->string('is_full_load', 3)->nullable();
            $table->integer('piece_count')->nullable();
            

        });

        DB::update("ALTER TABLE loads AUTO_INCREMENT = 8500;");
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
