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
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('driverid');
            $table->foreign('driverid')->references('driverid')->on('drivers')->onDelete('cascade');
            $table->string('plate');
            $table->foreign('plate')->references('plate')->on('trucks') ->onDelete('cascade');
            $table->date('date_recived');
            $table->date('date_detach')->nullable();
            $table->text('reason')->nullable();
            $table->boolean('status')->default(0);
            $table->boolean('is_attached')->default(1);
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
