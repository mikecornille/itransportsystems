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
            $table->string('created_by')->nullable();
            $table->string('customer')->nullable();
            $table->string('urgency')->nullable();
            $table->string('load_type')->nullable();
            $table->string('trailer_type')->nullable();
            $table->string('pick_city')->nullable();
            $table->string('pick_state')->nullable();
            $table->string('pick_date')->nullable();
            $table->string('pick_time')->nullable();
            $table->string('delivery_city')->nullable();
            $table->string('delivery_state')->nullable();
            $table->string('delivery_date')->nullable();
            $table->string('delivery_time')->nullable();
            $table->string('commodity')->nullable();
            $table->string('special_instructions')->nullable();
            $table->string('handler')->nullable();
            $table->string('length')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('miles')->nullable();
            $table->string('billing_money')->nullable();
            $table->string('offer_money')->nullable();
            $table->string('post_money')->nullable();
            $table->string('company_contact')->nullable();
            $table->string('contact_phone')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('countIncomingCalls')->nullable();
            $table->integer('countOutgoingCalls')->nullable();
            $table->integer('emailedOut')->nullable();
            $table->string('group_number')->nullable();
            $table->text('notes_on_load')->nullable();
            $table->text('specific_message')->nullable();
            $table->softDeletes();
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
