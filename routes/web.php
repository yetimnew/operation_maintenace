<?php
Auth::routes();


Route::group(['middleware' => ['auth']], function () {
    //Dashbord
    Route::get('/', 'DashbordController@index');
    Route::get('/home', 'DashbordController@index')->name('home');
    Route::get('/get-post-chart-data', 'DashbordController@getMonthlyPostData')->name('dashboard.show');
    // Route::get('/mukera', 'DashbordController@monthlyperformance')->name('mukera');
    Route::get('/markasread', function(){
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    })->name('read');
    
    Route::get('role', ['uses'=>'roleController@index','as'=>'role']);
    Route::resource('role','RoleController');
    Route::get('/role',                  ['uses'=>'RoleController@index','as'=>'role'])->middleware('admin');
    Route::get('/role/create',           ['uses'=>'RoleController@create','as'=>'role.create'])->middleware('admin');
    Route::post('/role/store',           ['uses'=>'RoleController@store','as'=>'role.store'])->middleware('admin');
    Route::get('/role/edit/{id}',        ['uses'=>'RoleController@edit','as'=>'role.edit'])->middleware('admin');
    Route::post('/role/update/{id}',     ['uses'=>'RoleController@update','as'=>'role.update'])->middleware('admin');
    Route::get('/role/destroy/{id}',     ['uses'=>'RoleController@destroy','as'=>'role.destroy'])->middleware('admin');
    // Rermission Controller
    Route::get('/permission',                  ['uses'=>'PermissionController@index','as'=>'permission'])->middleware('admin');
    Route::get('/permission/create',           ['uses'=>'PermissionController@create','as'=>'permission.create'])->middleware('admin');
    Route::post('/permission/store',           ['uses'=>'PermissionController@store','as'=>'permission.store'])->middleware('admin');
    Route::get('/permission/edit/{id}',        ['uses'=>'PermissionController@edit','as'=>'permission.edit'])->middleware('admin');
    Route::post('/permission/update/{id}',     ['uses'=>'PermissionController@update','as'=>'permission.update'])->middleware('admin');
    Route::get('/permission/destroy/{id}',     ['uses'=>'PermissionController@destroy','as'=>'permission.destroy'])->middleware('admin');
     
    Route::get('/dasboard',               ['uses'=>'DashbordController@index','as'=>'dasboard']);
//  user profile start here
    Route::get('/profile',                  ['uses'=>'hrm\profileController@index','as'=>'profile']);
    Route::post('/profile/update',          ['uses'=>'hrm\profileController@update','as'=>'profile.update']);
 //    user route
    Route::get('/user',                  ['uses'=>'UserController@index','as'=>'user'])->middleware('admin');
    Route::get('/user/create',           ['uses'=>'UserController@create','as'=>'user.create'])->middleware('admin');
    Route::post('/user/store',           ['uses'=>'UserController@store','as'=>'user.store'])->middleware('admin');
    Route::get('/user/edit/{id}',        ['uses'=>'UserController@edit','as'=>'user.edit'])->middleware('admin');
    Route::post('/user/update/{id}',     ['uses'=>'UserController@update','as'=>'user.update'])->middleware('admin');
    Route::get('/user/destroy/{id}',     ['uses'=>'UserController@destroy','as'=>'user.destroy'])->middleware('admin');
///////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////

// OPERATION

/////////////////////////////////////////////////////////////////

    Route::get('/truck',                  ['uses'=>'operation\TruckController@index','as'=>'truck']);
    Route::get('/truck/create',           ['uses'=>'operation\TruckController@create','as'=>'truck.create'])->middleware('permission:truck create');;
    Route::post('/truck/store',           ['uses'=>'operation\TruckController@store','as'=>'truck.store']);
    Route::get('/truck/edit/{id}',        ['uses'=>'operation\TruckController@edit','as'=>'truck.edit'])->middleware('permission:truck edit');;
    Route::get('/truck/show/{id}',        ['uses'=>'operation\TruckController@show','as'=>'truck.show'])->middleware('permission:truck view');;
    Route::get('/truck/deactivate/{id}',  ['uses'=>'operation\TruckController@deactivate','as'=>'truck.deactivate'])->middleware('permission:truck deactivate');;
    Route::post('/truck/update/{id}',     ['uses'=>'operation\TruckController@update','as'=>'truck.update']);
    Route::delete('/truck/destroy/{id}',  ['uses'=>'operation\TruckController@destroy','as'=>'truck.destroy'])->middleware('permission:truck delete');;
        
// Truck 
    Route::get('/vehecletype',              ['uses'=>'operation\VehecleController@index','as'=>'vehecletype']);
    Route::get('/vehecletype/create',       ['uses'=>'operation\VehecleController@create','as'=>'vehecletype.create'])->middleware('permission:truck_model create');
    Route::post('/vehecletype/store',       ['uses'=>'operation\VehecleController@store','as'=>'vehecletype.store']);
    Route::get('/vehecletype/edit/{id}',    ['uses'=>'operation\VehecleController@edit','as'=>'vehecletype.edit'])->middleware('permission:truck_model edit');
    Route::post('/vehecletype/update/{id}', ['uses'=>'operation\VehecleController@update','as'=>'vehecletype.update']);
    Route::get('/vehecletype/destroy/{id}', ['uses'=>'operation\VehecleController@destroy','as'=>'vehecletype.destroy'])->middleware('permission:truck_model delete');
// Driver 
    Route::get('/driver',                    ['uses'=>'operation\DriverController@index','as'=>'driver']);
    Route::get('/driverdata',                ['uses'=>'operation\DriverController@driverdata','as'=>'driver.driverdata']);
    Route::get('/driver/create',             ['uses'=>'operation\DriverController@create','as'=>'driver.create']);
    Route::post('/driver/store',             ['uses'=>'operation\DriverController@store','as'=>'driver.store']);
    Route::get('/driver/edit/{id}',          ['uses'=>'operation\DriverController@edit','as'=>'driver.edit']);
    Route::get('/driver/deactivate/{id}',    ['uses'=>'operation\DriverController@deactivate','as'=>'driver.deactivate']);
    Route::post('/driver/update/{id}',       ['uses'=>'operation\DriverController@update','as'=>'driver.update']);
    Route::get('/driver/destroy/{id}',       ['uses'=>'operation\DriverController@destroy','as'=>'driver.destroy']);
// Operation
    Route::get('/operation',                ['uses'=>'operation\OperationController@index','as'=>'operation']);
    Route::get('/operation/create',         ['uses'=>'operation\OperationController@create','as'=>'operation.create'])->middleware('permission:operation create');
    Route::post('/operation/store',         ['uses'=>'operation\OperationController@store','as'=>'operation.store']);
    Route::get('/operation/edit/{id}',      ['uses'=>'operation\OperationController@edit','as'=>'operation.edit'])->middleware('permission:operation edit');
    Route::get('/operation/show/{id}',      ['uses'=>'operation\OperationController@show','as'=>'operation.show'])->middleware('permission:operation view');
    Route::patch('/operation/update/{id}',   ['uses'=>'operation\OperationController@update','as'=>'operation.update']);
    Route::post('/operation/update2/{id}',   ['uses'=>'operation\OperationController@update2','as'=>'operation.update2']);
    Route::delete('/operation/destroy/{id}',   ['uses'=>'operation\OperationController@destroy','as'=>'operation.destroy'])->middleware('permission:operation delete');
    Route::get('/operation/close/{id}',     ['uses'=>'operation\OperationController@close','as'=>'operation.close'])->middleware('permission:operation close');
    Route::get('/operation/open/{id}',      ['uses'=>'operation\OperationController@open','as'=>'operation.open'])->middleware('permission:operation open');

// Region
    Route::get('/region',                   ['uses'=>'operation\RegionController@index','as'=>'region']);
    Route::get('/region/create',            ['uses'=>'operation\RegionController@create','as'=>'region.create']);
    Route::post('/region/store',            ['uses'=>'operation\RegionController@store','as'=>'region.store']);
    Route::get('/region/edit/{id}',         ['uses'=>'operation\RegionController@edit','as'=>'region.edit']);
    Route::post('/region/update/{id}',      ['uses'=>'operation\RegionController@update','as'=>'region.update']);
    Route::delete('/region/destroy/{id}',      ['uses'=>'operation\RegionController@destroy','as'=>'region.destroy']);
// Status
    Route::get('/status',                   ['uses'=>'operation\StatusController@index','as'=>'status']);
    Route::get('/status/create',            ['uses'=>'operation\StatusController@create','as'=>'status.create']);
    Route::get('/status/plate',             ['uses'=>'operation\StatusController@plate','as'=>'status.plate']);
    Route::post('/status/store',            ['uses'=>'operation\StatusController@store','as'=>'status.store']);
    Route::get('/status/edit/{id}',         ['uses'=>'operation\StatusController@edit','as'=>'status.edit']);
    Route::post('/status/update/{id}',      ['uses'=>'operation\StatusController@update','as'=>'status.update']);
    Route::delete('/status/destroy/{id}',      ['uses'=>'operation\StatusController@destroy','as'=>'status.destroy']);
// statusType
    Route::get('/statustype',              ['uses'=>'operation\StatustypeController@index','as'=>'statustype']);
    Route::get('/statustype/create',       ['uses'=>'operation\StatustypeController@create','as'=>'statustype.create']);
    Route::post('/statustype/store',       ['uses'=>'operation\StatustypeController@store','as'=>'statustype.store']);
    Route::get('/statustype/edit/{id}',    ['uses'=>'operation\StatustypeController@edit','as'=>'statustype.edit']);
    Route::post('/statustype/update/{id}', ['uses'=>'operation\StatustypeController@update','as'=>'statustype.update']);
    Route::delete('/statustype/destroy/{id}', ['uses'=>'operation\StatustypeController@destroy','as'=>'statustype.destroy']);
        
// statusType
    Route::get('/performace',              ['uses'=>'operation\PerformanceController@index','as'=>'performace']);
    Route::get('/performace/create',       ['uses'=>'operation\PerformanceController@create','as'=>'performace.create'])->middleware('permission:performance create');
    Route::post('/performace/store',       ['uses'=>'operation\PerformanceController@store','as'=>'performace.store']);
    Route::get('/performace/edit/{id}',    ['uses'=>'operation\PerformanceController@edit','as'=>'performace.edit'])->middleware('permission:performance edit');
    Route::get('/performace/show/{id}',    ['uses'=>'operation\PerformanceController@show','as'=>'performace.show'])->middleware('permission:performance view');
    Route::post('/performace/update/{id}', ['uses'=>'operation\PerformanceController@update','as'=>'performace.update']);
    Route::delete('/performace/destroy/{id}', ['uses'=>'operation\PerformanceController@destroy','as'=>'performace.destroy'])->middleware('permission:performance delete');
 
// statusType
    Route::get('/drivertruck',                              ['uses'=>'operation\TruckDriverController@index','as'=>'drivertruck']);
    Route::get('/drivertruck/create',                       ['uses'=>'operation\TruckDriverController@create','as'=>'drivertruck.create'])->middleware('permission:truck_driver create');
    Route::post('/drivertruck/store',                       ['uses'=>'operation\TruckDriverController@store','as'=>'drivertruck.store']);
    Route::get('/drivertruck/edit/{id}',                    ['uses'=>'operation\TruckDriverController@edit','as'=>'drivertruck.edit'])->middleware('permission:truck_driver edit');
    Route::get('/drivertruck/show/{id}',                    ['uses'=>'operation\TruckDriverController@show','as'=>'drivertruck.show']);
    Route::get('/drivertruck/detach/{id}',                  ['uses'=>'operation\TruckDriverController@detach','as'=>'drivertruck.detach'])->middleware('permission:truck_driver detach');
    Route::post('/drivertruck/update/{id}',                 ['uses'=>'operation\TruckDriverController@update','as'=>'drivertruck.update']);
    Route::post('/drivertruck/update_dt/{id}',              ['uses'=>'operation\TruckDriverController@update_dt','as'=>'drivertruck.update_dt']);
    Route::delete('/drivertruck/destroy/{id}',              ['uses'=>'operation\TruckDriverController@destroy','as'=>'drivertruck.destroy'])->middleware('permission:truck_driver delete');
        
// statusType
    Route::get('/place',                                    ['uses'=>'operation\PlaceController@index','as'=>'place']);
    Route::get('/place/create',                             ['uses'=>'operation\PlaceController@create','as'=>'place.create']);
    Route::post('/place/store',                             ['uses'=>'operation\PlaceController@store','as'=>'place.store']);
    Route::get('/place/edit/{id}',                          ['uses'=>'operation\PlaceController@edit','as'=>'place.edit']);
    Route::post('/place/update/{id}',                       ['uses'=>'operation\PlaceController@update','as'=>'place.update']);
    Route::delete('/place/destroy/{id}',                       ['uses'=>'operation\PlaceController@destroy','as'=>'place.destroy']);
// statusType
    Route::get('/distance',                                    ['uses'=>'operation\DistanceController@index','as'=>'distance']);
    Route::get('/distance/create',                             ['uses'=>'operation\DistanceController@create','as'=>'distance.create']);
    Route::post('/distance/store',                             ['uses'=>'operation\DistanceController@store','as'=>'distance.store']);
    Route::get('/distance/edit/{id}',                          ['uses'=>'operation\DistanceController@edit','as'=>'distance.edit']);
    Route::post('/distance/update/{id}',                       ['uses'=>'operation\DistanceController@update','as'=>'distance.update']);
    Route::get('/distance/destroy/{id}',                       ['uses'=>'operation\DistanceController@destroy','as'=>'distance.destroy']);
   
   
    
   // Customer
   Route::get('/customer',                 ['uses'=>'CustomerController@index','as'=>'customer']);
   Route::get('/customer/create',          ['uses'=>'CustomerController@create','as'=>'customer.create'])->middleware('permission:customer create');
   Route::post('/customer/store',          ['uses'=>'CustomerController@store','as'=>'customer.store']);
   Route::get('/customer/edit/{id}',       ['uses'=>'CustomerController@edit','as'=>'customer.edit'])->middleware('permission:customer edit');;
   Route::patch('/customer/update/{id}',    ['uses'=>'CustomerController@update','as'=>'customer.update']);
   Route::delete('/customer/destroy/{id}',    ['uses'=>'CustomerController@destroy','as'=>'customer.destroy'])->middleware('permission:customer delete');;
   
    //reports
    Route::get('/performance_by_driver',                     ['uses'=>'operation\Reports\performanceByDriverController@index','as'=>'performance_by_driver']);
    Route::get('/performance_by_driver/create',              ['uses'=>'operation\Reports\performanceByDriverController@create','as'=>'performance_by_driver.create']);
    Route::post('/performance_by_driver/store',              ['uses'=>'operation\Reports\performanceByDriverController@store','as'=>'performance_by_driver.store']);
    Route::get('/performance_by_driver/edit/{id}',           ['uses'=>'operation\Reports\performanceByDriverController@edit','as'=>'performance_by_driver.edit']);
    Route::post('/performance_by_driver/update/{id}',        ['uses'=>'operation\Reports\performanceByDriverController@update','as'=>'performance_by_driver.update']);
    Route::get('/performance_by_driver/destroy/{id}',        ['uses'=>'operation\Reports\performanceByDriverController@destroy','as'=>'performance_by_driver.destroy']);


    //performrmace of all drivers 
    Route::get('/performance_of_all_driver',                     ['uses'=>'operation\Reports\performanceOfAllDriverController@index','as'=>'performance_of_all_driver']);
    Route::get('/performance_of_all_driver/create',              ['uses'=>'operation\Reports\performanceOfAllDriverController@create','as'=>'performance_of_all_driver.create']);
    Route::post('/performance_of_all_driver/store',              ['uses'=>'operation\Reports\performanceOfAllDriverController@store','as'=>'performance_of_all_driver.store']);
   
    //reports
    Route::get('/performance_by_truck',                     ['uses'=>'operation\Reports\PerformanceByTruckController@index','as'=>'performance_by_truck']);
    Route::get('/performance_by_truck/create',              ['uses'=>'operation\Reports\PerformanceByTruckController@create','as'=>'performance_by_truck.create']);
    Route::post('/performance_by_truck/store',              ['uses'=>'operation\Reports\PerformanceByTruckController@store','as'=>'performance_by_truck.store']);
    Route::get('/performance_by_truck/edit/{id}',           ['uses'=>'operation\Reports\PerformanceByTruckController@edit','as'=>'performance_by_truck.edit']);
    Route::post('/performance_by_truck/update/{id}',        ['uses'=>'operation\Reports\PerformanceByTruckController@update','as'=>'performance_by_truck.update']);
    Route::get('/performance_by_truck/destroy/{id}',        ['uses'=>'operation\Reports\PerformanceByTruckController@destroy','as'=>'performance_by_truck.destroy']);
    //report of the Operations and therir stattus
    Route::get('/performance_by_opration',                     ['uses'=>'operation\Reports\performanceByOprationController@index','as'=>'performance_by_opration']);
    Route::post('/performance_by_opration/store',              ['uses'=>'operation\Reports\performanceByOprationController@store','as'=>'performance_by_opration.store']);
    Route::get('/performance_by_opration/create',              ['uses'=>'operation\Reports\performanceByOprationController@create','as'=>'performance_by_opration.create']);
    Route::get('/performance_by_opration/details/{id}',  ['uses'=>'operation\Reports\performanceByOprationController@details','as'=>'performance_by_opration.details']);
    
    //report of the Operations and therir stattus
  
    Route::get('/performance_by_status',                     ['uses'=>'operation\Reports\performanceByStatusController@index','as'=>'performance_by_status']);
    Route::get('/performance_by_status/create',              ['uses'=>'operation\Reports\performanceByStatusController@create','as'=>'performance_by_status.create']);
    // Route::get('/performance_by_status/mukera',              ['uses'=>'operation\Reports\performanceByStatusController@mukera','as'=>'performance_by_status.mukera']);
    Route::post('/performance_by_status/view',              ['uses'=>'operation\Reports\performanceByStatusController@view','as'=>'performance_by_status.view']);
    Route::get('/performance_by_status/show',              ['uses'=>'operation\Reports\performanceByStatusController@show','as'=>'performance_by_status.show']);
    Route::post('/performance_by_status/store',              ['uses'=>'operation\Reports\performanceByStatusController@store','as'=>'performance_by_status.store']);
    Route::get('/performance_by_status/edit/{id}',           ['uses'=>'operation\Reports\performanceByStatusController@edit','as'=>'performance_by_status.edit']);
    Route::post('/performance_by_status/update/{id}',        ['uses'=>'operation\Reports\performanceByStatusController@update','as'=>'performance_by_status.update']);
    Route::get('/performance_by_status/destroy/{id}',        ['uses'=>'operation\Reports\performanceByStatusController@destroy','as'=>'performance_by_status.destroy']);
      
    //report of the Operations and therir stattus
    Route::get('/performance_by_model',                     ['uses'=>'operation\Reports\performanceByModelController@index','as'=>'performance_by_model']);
    Route::get('/performance_by_model/create',              ['uses'=>'operation\Reports\performanceByModelController@create','as'=>'performance_by_model.create']);
    Route::post('/performance_by_model/store',              ['uses'=>'operation\Reports\performanceByModelController@store','as'=>'performance_by_model.store']);

    // role and permiision 
    Route::get('backup', ['uses'=>'BackupController@index','as'=>'backup']);
    Route::get('backup/create', 'BackupController@create');
    Route::get('backup/download/{file_name}', 'BackupController@download');
    Route::get('backup/download/{file_name}', ['uses'=>'BackupController@download','as'=>'backupDownload']);
    Route::delete('backup/delete/{file_name}', ['uses'=>'BackupController@delete','as'=>'deleteDownload']);

   
    Route::get('/check_distance/{id}',                         ['uses'=>'CheckDistanceController@check','as'=>'check']);
    // Route::get('/check_distance/{id}'                           , function($id){ return \App\Distance::find($id);});
   
    // performance ajax request and response
    Route::get('ajaxRequest', 'PerformanceController@ajaxRequest')->name('performace.distance');
    Route::post('ajaxRequest', 'PerformanceController@ajaxRequestPost')->name('performace.distance');
   
    ///////////////////////////////////////////////////////
    // HRM //
    /////////////////////////////////////////////////////////

    Route::get('/personale',                                    ['uses'=>'hrm\PersonaleController@index','as'=>'personale']);
    Route::get('/personale/create',                             ['uses'=>'hrm\PersonaleController@create','as'=>'personale.create']);
    Route::post('/personale/store',                             ['uses'=>'hrm\PersonaleController@store','as'=>'personale.store']);
    Route::get('/personale/show/{id}',                          ['uses'=>'hrm\PersonaleController@show','as'=>'personale.show']);
    Route::get('/personale/edit/{id}',                          ['uses'=>'hrm\PersonaleController@edit','as'=>'personale.edit']);
    Route::patch('/personale/update/{id}',                       ['uses'=>'hrm\PersonaleController@update','as'=>'personale.update']);
    Route::delete('/personale/destroy/{id}',                    ['uses'=>'hrm\PersonaleController@destroy','as'=>'personale.destroy']); 
});
