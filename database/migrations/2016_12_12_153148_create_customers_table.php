<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('location_number');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('fax');
            $table->string('name_1');
            $table->string('phone_1');
            $table->string('email_1');
            $table->string('name_2');
            $table->string('phone_2');
            $table->string('email_2');
            $table->string('name_3');
            $table->string('phone_3');
            $table->string('email_3');
            $table->string('name_4');
            $table->string('phone_4');
            $table->string('email_4');
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
        Schema::dropIfExists('customers');
    }
}
