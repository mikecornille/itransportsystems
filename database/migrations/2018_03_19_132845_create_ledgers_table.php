<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLedgersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ledgers', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('pro_number')->nullable();
            $table->string('type')->nullable();
            $table->string('type_description')->nullable();
            $table->string('type_description_sub')->nullable();
            $table->string('journal_entry_number')->nullable();
            $table->string('date')->nullable();
            $table->string('reference_number')->nullable();
            $table->string('account_name')->nullable();
            $table->bigInteger('account_id')->nullable();
            $table->string('memo')->nullable();
            $table->string('payment_amount')->nullable();
            $table->string('deposit_amount')->nullable();
            $table->string('upload_date')->nullable();
            $table->string('payment_method')->nullable();
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
        Schema::dropIfExists('ledgers');
    }
}
