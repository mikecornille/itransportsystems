<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->string('months_profit')->nullable();
            $table->string('employee_type')->nullable();
            $table->bigInteger('weekly_draw')->nullable();
            $table->bigInteger('ncm')->nullable();
            $table->bigInteger('commission')->nullable();
            $table->bigInteger('bonus')->nullable();
            $table->bigInteger('additional')->nullable();
            $table->text('employee_payout_notes')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
