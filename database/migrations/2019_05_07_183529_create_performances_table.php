<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerformancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('LoadType');
            $table->string('FOnumber');
            $table->integer('operation_id')->index();
            $table->integer('driver_truck_id')->index();
            // $table->integer('driver_id')->index();
            $table->dateTime('DateDispach');
            $table->integer('orgion_id');
            $table->integer('destination_id');
            $table->double('DistanceWCargo',12,4);
            $table->double('tonkm',20,4)->default(0.00);
            $table->double('DistanceWOCargo',12,4)->nullable();
            $table->double('CargoVolumMT',12,4)->nullable();
            $table->double('fuelInLitter',12,4)->nullable();
            $table->double('fuelInBirr',12,4)->nullable();
            $table->double('perdiem',12,4)->nullable();
            $table->double('workOnGoing',12,4)->nullable();
            $table->double('other',12,4)->nullable();
            $table->text('comment')->nullable();
            $table->boolean('satus')->default(1);
            $table->boolean('is_returned')->default(0);
            $table->dateTime('returned_date')->nullable();
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
        Schema::dropIfExists('performances');
    }
}
