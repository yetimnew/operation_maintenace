<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriverTruckTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver_truck', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('driverid')->index();
            $table->foreign('driverid')->references('driverid')->on('drivers') ->onDelete('restrict');
            $table->string('plate')->index();
            $table->foreign('plate')->references('plate')->on('trucks') ->onDelete('restrict');
            $table->date('date_recived');
            $table->date('date_detach')->nullable();
            $table->text('reason')->nullable();
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('driver_truck');
    }
}
