<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerformanceByPlateView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE VIEW performance_by_plate_view AS
        (
            SELECT
    `trucks`.`id`,
    `trucks`.`plate`,
    `driver_truck`.`driverid`,
    `driver_truck`.`plate` AS `dtplate`,
    `drivers`.`name`,
    `performances`.`DateDispach` AS `DateDispach`,
    COUNT(performances.FOnumber) AS fo,
    SUM(performances.CargoVolumMT) AS CargoVolumMT,
    SUM(performances.DistanceWCargo) AS TDWC,
    SUM(performances.DistanceWOCargo) AS TDWOC,
    SUM(performances.tonkm) AS tonkm,
    SUM(performances.fuelInLitter) AS fl,
    SUM(performances.fuelInBirr) AS fB
FROM
    `performances`
LEFT JOIN `driver_truck` ON `driver_truck`.`id` = `performances`.`driver_truck_id`
LEFT JOIN `drivers` ON `drivers`.`driverid` = `driver_truck`.`driverid`
LEFT JOIN `trucks` ON `trucks`.`id` = `performances`.`driver_truck_id`
GROUP BY
    `trucks`.`plate`
ORDER BY
    `tonkm`
DESC
           )
         ");
      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('performance_by_plate_view');
    }
}
