<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerformanceByModelReportViews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW performance_by_model_report_views AS
            (
                SELECT `tims_laravel`.`trucks`.`vehecletype_id` AS `vehecletype_id`,
                `tims_laravel`.`vehecletypes`.`name` AS `name`,
                COUNT(
                    DISTINCT `tims_laravel`.`trucks`.`plate`
                ) AS `no`,
                COUNT(
                    `tims_laravel`.`performances`.`FOnumber`
                ) AS `Trip`,
                SUM(
                    `tims_laravel`.`performances`.`DistanceWCargo`
                ) AS `dwc`,
                SUM(
                    `tims_laravel`.`performances`.`DistanceWOCargo`
                ) AS `dwoc`,
                SUM(
                    `tims_laravel`.`performances`.`CargoVolumMT`
                ) AS `Tone`,
                (
                    SUM(
                        `tims_laravel`.`performances`.`DistanceWCargo`
                    ) + SUM(
                        `tims_laravel`.`performances`.`DistanceWOCargo`
                    )
                ) AS `KM`,
                SUM(
                    (
                        `tims_laravel`.`performances`.`CargoVolumMT` * `tims_laravel`.`performances`.`DistanceWCargo`
                    )
                ) AS `Tonek`,
                SUM(
                    `tims_laravel`.`performances`.`fuelInLitter`
                ) AS `fl`,
                SUM(
                    `tims_laravel`.`performances`.`fuelInBirr`
                ) AS `fib`,
                SUM(
                    `tims_laravel`.`performances`.`perdiem`
                ) AS `Perdium`,
                SUM(
                    `tims_laravel`.`performances`.`other`
                ) AS `other`,
                (
                    (
                        SUM(
                            `tims_laravel`.`performances`.`fuelInBirr`
                        ) + SUM(
                            `tims_laravel`.`performances`.`perdiem`
                        )
                    ) + SUM(
                        `tims_laravel`.`performances`.`other`
                    )
                ) AS `totla`
            FROM
                (
                    (
                        `tims_laravel`.`trucks`
                    JOIN `tims_laravel`.`vehecletypes` ON
                        (
                            (
                                `tims_laravel`.`vehecletypes`.`id` = `tims_laravel`.`trucks`.`vehecletype_id`
                            )
                        )
                    )
                LEFT JOIN `tims_laravel`.`performances` ON
                    (
                        (
                            `tims_laravel`.`trucks`.`id` = `tims_laravel`.`performances`.`driver_truck_id`
                        )
                    )
                )
            GROUP BY
                `tims_laravel`.`vehecletypes`.`id`
            ORDER BY
                `tims_laravel`.`performances`.`FOnumber`
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
        DB::statement('DROP VIEW IF EXISTs performance_by_model_report_views');
    
    }
}
