<?php
Auth::routes();


Route::group(['middleware' => ['auth']], function () {
    //Dashbord
    Route::get('/', 'DashbordController@index');
    Route::get('/home', 'DashbordController@index')->name('home');
    
    Route::get('role', ['uses'=>'roleController@index','as'=>'role']);
// role and permission
     
    Route::get('/dasboard',               ['uses'=>'DashbordController@index','as'=>'dasboard']);
//  user profile start here
    Route::get('/profile',                  ['uses'=>'profileController@index','as'=>'profile']);
//    user route
    Route::get('/user',                  ['uses'=>'userController@index','as'=>'user'])->middleware('admin');
    Route::get('/user/create',           ['uses'=>'userController@create','as'=>'user.create'])->middleware('admin');
    Route::post('/user/store',           ['uses'=>'userController@store','as'=>'user.store'])->middleware('admin');
    Route::get('/user/edit/{id}',        ['uses'=>'userController@edit','as'=>'user.edit'])->middleware('admin');
    Route::post('/user/update/{id}',     ['uses'=>'userController@update','as'=>'user.update'])->middleware('admin');
    Route::get('/user/destroy/{id}',     ['uses'=>'userController@destroy','as'=>'user.destroy'])->middleware('admin');

    Route::get('/truck',                  ['uses'=>'TruckController@index','as'=>'truck']);
    Route::get('/truck/create',           ['uses'=>'TruckController@create','as'=>'truck.create']);
    Route::post('/truck/store',           ['uses'=>'TruckController@store','as'=>'truck.store']);
    Route::get('/truck/edit/{id}',        ['uses'=>'TruckController@edit','as'=>'truck.edit']);
    Route::post('/truck/update/{id}',     ['uses'=>'TruckController@update','as'=>'truck.update']);
    Route::get('/truck/destroy/{id}',     ['uses'=>'TruckController@destroy','as'=>'truck.destroy']);
        
// Truck 
    Route::get('/vehecletype',              ['uses'=>'VehecleController@index','as'=>'vehecletype']);
    Route::get('/vehecletype/create',       ['uses'=>'VehecleController@create','as'=>'vehecletype.create']);
    Route::post('/vehecletype/store',       ['uses'=>'VehecleController@store','as'=>'vehecletype.store']);
    Route::get('/vehecletype/edit/{id}',    ['uses'=>'VehecleController@edit','as'=>'vehecletype.edit']);
    Route::post('/vehecletype/update/{id}', ['uses'=>'VehecleController@update','as'=>'vehecletype.update']);
    Route::get('/vehecletype/destroy/{id}', ['uses'=>'VehecleController@destroy','as'=>'vehecletype.destroy']);
// Driver 
    Route::get('/driver',                    ['uses'=>'DriverController@index','as'=>'driver']);
    Route::get('/driver/create',             ['uses'=>'DriverController@create','as'=>'driver.create']);
    Route::post('/driver/store',             ['uses'=>'DriverController@store','as'=>'driver.store']);
    Route::get('/driver/edit/{id}',          ['uses'=>'DriverController@edit','as'=>'driver.edit']);
    Route::post('/driver/update/{id}',       ['uses'=>'DriverController@update','as'=>'driver.update']);
    Route::get('/driver/destroy/{id}',       ['uses'=>'DriverController@destroy','as'=>'driver.destroy']);
// Operation
    Route::get('/operation',                ['uses'=>'OperationController@index','as'=>'operation']);
    Route::get('/operation/create',         ['uses'=>'OperationController@create','as'=>'operation.create']);
    Route::post('/operation/store',         ['uses'=>'OperationController@store','as'=>'operation.store']);
    Route::get('/operation/edit/{id}',      ['uses'=>'OperationController@edit','as'=>'operation.edit']);
    Route::patch('/operation/update/{id}',   ['uses'=>'OperationController@update','as'=>'operation.update']);
    Route::post('/operation/update2/{id}',   ['uses'=>'OperationController@update2','as'=>'operation.update2']);
    Route::get('/operation/destroy/{id}',   ['uses'=>'OperationController@destroy','as'=>'operation.destroy']);
    Route::get('/operation/close/{id}',     ['uses'=>'OperationController@close','as'=>'operation.close']);
    Route::get('/operation/open/{id}',      ['uses'=>'OperationController@open','as'=>'operation.open']);
// Customer
    Route::get('/customer',                 ['uses'=>'CustomerController@index','as'=>'customer']);
    Route::get('/customer/create',          ['uses'=>'CustomerController@create','as'=>'customer.create']);
    Route::post('/customer/store',          ['uses'=>'CustomerController@store','as'=>'customer.store']);
    Route::get('/customer/edit/{id}',       ['uses'=>'CustomerController@edit','as'=>'customer.edit']);
    Route::post('/customer/update/{id}',    ['uses'=>'CustomerController@update','as'=>'customer.update']);
    Route::get('/customer/destroy/{id}',    ['uses'=>'CustomerController@destroy','as'=>'customer.destroy']);
// Region
    Route::get('/region',                   ['uses'=>'RegionController@index','as'=>'region']);
    Route::get('/region/create',            ['uses'=>'RegionController@create','as'=>'region.create']);
    Route::post('/region/store',            ['uses'=>'RegionController@store','as'=>'region.store']);
    Route::get('/region/edit/{id}',         ['uses'=>'RegionController@edit','as'=>'region.edit']);
    Route::post('/region/update/{id}',      ['uses'=>'RegionController@update','as'=>'region.update']);
    Route::get('/region/destroy/{id}',      ['uses'=>'RegionController@destroy','as'=>'region.destroy']);
// Status
    Route::get('/status',                   ['uses'=>'StatusController@index','as'=>'status']);
    Route::get('/status/create',            ['uses'=>'StatusController@create','as'=>'status.create']);
    Route::get('/status/plate',             ['uses'=>'StatusController@plate','as'=>'status.plate']);
    Route::post('/status/store',            ['uses'=>'StatusController@store','as'=>'status.store']);
    Route::get('/status/edit/{id}',         ['uses'=>'StatusController@edit','as'=>'status.edit']);
    Route::post('/status/update/{id}',      ['uses'=>'StatusController@update','as'=>'status.update']);
    Route::get('/status/destroy/{id}',      ['uses'=>'StatusController@destroy','as'=>'status.destroy']);
// statusType
    Route::get('/statustype',              ['uses'=>'StatustypeController@index','as'=>'statustype']);
    Route::get('/statustype/create',       ['uses'=>'StatustypeController@create','as'=>'statustype.create']);
    Route::post('/statustype/store',       ['uses'=>'StatustypeController@store','as'=>'statustype.store']);
    Route::get('/statustype/edit/{id}',    ['uses'=>'StatustypeController@edit','as'=>'statustype.edit']);
    Route::post('/statustype/update/{id}', ['uses'=>'StatustypeController@update','as'=>'statustype.update']);
    Route::get('/statustype/destroy/{id}', ['uses'=>'StatustypeController@destroy','as'=>'statustype.destroy']);
        
// statusType
    Route::get('/performace',              ['uses'=>'PerformanceController@index','as'=>'performace']);
    Route::get('/performace/create',       ['uses'=>'PerformanceController@create','as'=>'performace.create']);
    Route::post('/performace/store',       ['uses'=>'PerformanceController@store','as'=>'performace.store']);
    Route::get('/performace/edit/{id}',    ['uses'=>'PerformanceController@edit','as'=>'performace.edit']);
    Route::post('/performace/update/{id}', ['uses'=>'PerformanceController@update','as'=>'performace.update']);
    Route::get('/performace/destroy/{id}', ['uses'=>'PerformanceController@destroy','as'=>'performace.destroy']);
    
// statusType
    Route::get('/drivertruck',                              ['uses'=>'TruckDriverController@index','as'=>'drivertruck']);
    Route::get('/drivertruck/create',                       ['uses'=>'TruckDriverController@create','as'=>'drivertruck.create']);
    Route::post('/drivertruck/store',                       ['uses'=>'TruckDriverController@store','as'=>'drivertruck.store']);
    Route::get('/drivertruck/edit/{id}',                    ['uses'=>'TruckDriverController@edit','as'=>'drivertruck.edit']);
    Route::get('/drivertruck/detach/{id}',                  ['uses'=>'TruckDriverController@detach','as'=>'drivertruck.detach']);
    Route::post('/drivertruck/update/{id}',                 ['uses'=>'TruckDriverController@update','as'=>'drivertruck.update']);
    Route::post('/drivertruck/update_dt/{id}',              ['uses'=>'TruckDriverController@update_dt','as'=>'drivertruck.update_dt']);
    Route::get('/drivertruck/destroy/{id}',                 ['uses'=>'TruckDriverController@destroy','as'=>'drivertruck.destroy']);
        
// statusType
    Route::get('/place',                                    ['uses'=>'PlaceController@index','as'=>'place']);
    Route::get('/place/create',                             ['uses'=>'PlaceController@create','as'=>'place.create']);
    Route::post('/place/store',                             ['uses'=>'PlaceController@store','as'=>'place.store']);
    Route::get('/place/edit/{id}',                          ['uses'=>'PlaceController@edit','as'=>'place.edit']);
    Route::post('/place/update/{id}',                       ['uses'=>'PlaceController@update','as'=>'place.update']);
    Route::get('/place/destroy/{id}',                       ['uses'=>'PlaceController@destroy','as'=>'place.destroy']);
    //reports
    Route::get('/performance_by_driver',                     ['uses'=>'performanceByDriverController@index','as'=>'performance_by_driver']);
    Route::get('/performance_by_driver/create',              ['uses'=>'performanceByDriverController@create','as'=>'performance_by_driver.create']);
    Route::post('/performance_by_driver/store',              ['uses'=>'performanceByDriverController@store','as'=>'performance_by_driver.store']);
    Route::get('/performance_by_driver/edit/{id}',           ['uses'=>'performanceByDriverController@edit','as'=>'performance_by_driver.edit']);
    Route::post('/performance_by_driver/update/{id}',        ['uses'=>'performanceByDriverController@update','as'=>'performance_by_driver.update']);
    Route::get('/performance_by_driver/destroy/{id}',        ['uses'=>'performanceByDriverController@destroy','as'=>'performance_by_driver.destroy']);
    //reports
    Route::get('/performance_by_truck',                     ['uses'=>'performanceByTruckController@index','as'=>'performance_by_truck']);
    Route::get('/performance_by_truck/create',              ['uses'=>'performanceByTruckController@create','as'=>'performance_by_truck.create']);
    Route::post('/performance_by_truck/store',              ['uses'=>'performanceByTruckController@store','as'=>'performance_by_truck.store']);
    Route::get('/performance_by_truck/edit/{id}',           ['uses'=>'performanceByTruckController@edit','as'=>'performance_by_truck.edit']);
    Route::post('/performance_by_truck/update/{id}',        ['uses'=>'performanceByTruckController@update','as'=>'performance_by_truck.update']);
    Route::get('/performance_by_truck/destroy/{id}',        ['uses'=>'performanceByTruckController@destroy','as'=>'performance_by_truck.destroy']);
    //report of the Operations and therir stattus
    Route::get('/performance_by_opration',                     ['uses'=>'performanceByOprationController@index','as'=>'performance_by_opration']);
    Route::post('/performance_by_opration/store',              ['uses'=>'performanceByOprationController@store','as'=>'performance_by_opration.store']);
    Route::get('/performance_by_opration/create',              ['uses'=>'performanceByOprationController@create','as'=>'performance_by_opration.create']);
    Route::get('/performance_by_opration/details/{id}',  ['uses'=>'performanceByOprationController@details','as'=>'performance_by_opration.details']);
    
    //report of the Operations and therir stattus
  
    Route::get('/performance_by_status',                     ['uses'=>'performanceByStatusController@index','as'=>'performance_by_status']);
    Route::get('/performance_by_status/create',              ['uses'=>'performanceByStatusController@create','as'=>'performance_by_status.create']);
    Route::post('/performance_by_status/view',              ['uses'=>'performanceByStatusController@view','as'=>'performance_by_status.view']);
    Route::post('/performance_by_status/store',              ['uses'=>'performanceByStatusController@store','as'=>'performance_by_status.store']);
    Route::get('/performance_by_status/edit/{id}',           ['uses'=>'performanceByStatusController@edit','as'=>'performance_by_status.edit']);
    Route::post('/performance_by_status/update/{id}',        ['uses'=>'performanceByStatusController@update','as'=>'performance_by_status.update']);
    Route::get('/performance_by_status/destroy/{id}',        ['uses'=>'performanceByStatusController@destroy','as'=>'performance_by_status.destroy']);
      
    //report of the Operations and therir stattus
    Route::get('/performance_by_model',                     ['uses'=>'performanceByModelController@index','as'=>'performance_by_model']);
    Route::get('/performance_by_model/create',              ['uses'=>'performanceByModelController@create','as'=>'performance_by_model.create']);
    Route::post('/performance_by_model/store',              ['uses'=>'performanceByModelController@store','as'=>'performance_by_model.store']);

    // role and permiision 
    Route::get('backup', ['uses'=>'BackupController@index','as'=>'backup']);
    Route::get('backup/create', 'BackupController@create');
    Route::get('backup/download/{file_name}', 'BackupController@download');
    Route::get('backup/download/{file_name}', ['uses'=>'BackupController@download','as'=>'backupDownload']);
    Route::get('backup/delete/{file_name}', ['uses'=>'BackupController@delete','as'=>'deleteDownload']);
        
});
