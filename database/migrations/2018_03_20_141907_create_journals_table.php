<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type')->nullable();
            $table->string('type_description')->nullable();
            $table->string('type_description_sub')->nullable();
            $table->string('reference_number')->nullable();
            $table->string('account_name')->nullable();
            $table->bigInteger('account_id')->nullable();
            $table->string('memo')->nullable();
            $table->string('payment_amount')->nullable();
            $table->string('deposit_amount')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('name_on_check')->nullable();
            $table->string('payment_number')->nullable();
            $table->string('invoice_date_journal')->nullable();
            $table->string('upload_date')->nullable();
            $table->string('address')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment_cents')->nullable();
            $table->string('cleared')->nullable();
            $table->string('cleared_date')->nullable();
            $table->string('off_ledger')->nullable();
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
        Schema::dropIfExists('journals');
    }
}
