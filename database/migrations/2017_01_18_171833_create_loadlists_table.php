<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoadlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loadlists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('created_by');
            $table->string('customer');
            $table->string('urgency');
            $table->string('load_type');
            $table->string('trailer_type');
            $table->string('pick_city');
            $table->string('pick_state');
            $table->string('pick_date');
            $table->string('pick_time');
            $table->string('delivery_city');
            $table->string('delivery_state');
            $table->string('delivery_date');
            $table->string('delivery_time');
            $table->string('commodity');
            $table->string('special_instructions');
            $table->string('length');
            $table->string('width');
            $table->string('height');
            $table->string('weight');
            $table->string('miles');
            $table->string('billing_money');
            $table->string('offer_money');
            $table->string('post_money');
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
        Schema::dropIfExists('loadlists');
    }
}
