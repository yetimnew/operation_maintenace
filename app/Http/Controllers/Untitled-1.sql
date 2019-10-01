select`vehecletypes`.`name`, `trucks`.`vehecletype_id`
,count(distinct `tims_laravel`.`trucks`.`plate`) AS `no`
,count(`tims_laravel`.`performances`.`FOnumber`) AS `Trip`
,sum(`tims_laravel`.`performances`.`DistanceWCargo`) AS `dwc`
,sum(`tims_laravel`.`performances`.`DistanceWOCargo`) AS `dwoc`
,sum(`tims_laravel`.`performances`.`CargoVolumMT`) AS `Tone`
,(sum(`tims_laravel`.`performances`.`DistanceWCargo`) + sum(`tims_laravel`.`performances`.`DistanceWOCargo`)) AS `KM`
,sum((`tims_laravel`.`performances`.`CargoVolumMT` * `tims_laravel`.`performances`.`DistanceWCargo`)) AS `Tonek`
,sum(`tims_laravel`.`performances`.`fuelInLitter`) AS `fl`,sum(`tims_laravel`.`performances`.`fuelInBirr`) AS `fib`
,sum(`tims_laravel`.`performances`.`perdiem`) AS `Perdium`,sum(`tims_laravel`.`performances`.`other`) AS `other`
,((sum(`tims_laravel`.`performances`.`fuelInBirr`) + sum(`tims_laravel`.`performances`.`perdiem`)) + sum(`tims_laravel`.`performances`.`other`)) AS `totla` 
from (((`tims_laravel`.`trucks` 
join `tims_laravel`.`vehecletypes` 
on((`tims_laravel`.`vehecletypes`.`id` = `tims_laravel`.`trucks`.`vehecletype_id`)))
left join `tims_laravel`.`performances` on((`tims_laravel`.`trucks`.`id` = `tims_laravel`.`performances`.`truck_id`))) 
where (`tims_laravel`.`trucks`.`status` = 1) 
  group by `tims_laravel`.`vehecletypes`.`id`
  order by count(`tims_laravel`.`performances`.`FOnumber`) desc