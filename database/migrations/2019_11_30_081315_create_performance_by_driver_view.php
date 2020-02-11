<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerformanceByDriverView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE VIEW performance_by_driver_view AS
        (
            SELECT
            `tims_laravel`.`driver_truck`.`id` AS `id`,
            `tims_laravel`.`driver_truck`.`driverid` AS `driverid`,
            `tims_laravel`.`drivers`.`name` AS `name`,
            `tims_laravel`.`driver_truck`.`plate` AS `plate`,
            `tims_laravel`.`performances`.`DateDispach` AS `DateDispach`,
            COUNT(
                `tims_laravel`.`performances`.`trip`
            ) AS `fo`,
            SUM(
                `tims_laravel`.`performances`.`CargoVolumMT`
            ) AS `CargoVolumMT`,
            SUM(
                `tims_laravel`.`performances`.`DistanceWCargo`
            ) AS `TDWC`,
            SUM(
                `tims_laravel`.`performances`.`DistanceWOCargo`
            ) AS `TDWOC`,
            SUM(
                `tims_laravel`.`performances`.`tonkm`
            ) AS `tonkm`,
            SUM(
                `tims_laravel`.`performances`.`fuelInLitter`
            ) AS `fl`,
            SUM(
                `tims_laravel`.`performances`.`fuelInBirr`
            ) AS `fB`,
            SUM(
                `tims_laravel`.`performances`.`perdiem`
            ) AS `perdiem`,
            SUM(
                `tims_laravel`.`performances`.`workOnGoing`
            ) AS `workOnGoing`,
            SUM(
                `tims_laravel`.`performances`.`other`
            ) AS `other`
        FROM
            (
                (
                    `tims_laravel`.`performances`
                LEFT JOIN `tims_laravel`.`driver_truck` ON
                    (
                        `tims_laravel`.`driver_truck`.`id` = `tims_laravel`.`performances`.`driver_truck_id`
                    )
                )
            LEFT JOIN `tims_laravel`.`drivers` ON
                (
                    `tims_laravel`.`drivers`.`driverid` = `tims_laravel`.`driver_truck`.`driverid`
                )
            )
        GROUP BY
            `tims_laravel`.`driver_truck`.`id`
        ORDER BY
            COUNT(
                `tims_laravel`.`performances`.`FOnumber`
            )
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
        Schema::dropIfExists('performance_by_driver_view');
    }
}
