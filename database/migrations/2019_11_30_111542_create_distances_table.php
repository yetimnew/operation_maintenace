<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('origin_id')->index();
            $table->string('origin_name');
            // $table->foreign('driverid')->references('driverid')->on('drivers') ->onDelete('restrict');
            $table->bigInteger('destination_id')->index();
            $table->string('destination_name');
            $table->bigInteger('km');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('distances');
    }
}
