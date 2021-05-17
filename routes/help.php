Route::get('/areas','App\Http\Controllers\AreaController@index')->name('areas.index');
Route::get('/areas/all','App\Http\Controllers\AreaController@showall')->name('areas.showall');
Route::get('/areas/editar/{id}','App\Http\Controllers\AreaController@showedit')->name('areas.edit');
Route::get('/areas/detalleone/{id}','App\Http\Controllers\AreaController@showone')->name('areas.nuevo');
Route::get('/areas/agregar','App\Http\Controllers\AreaController@create')->name('areas.create');
Route::get('/areas/detalle/{id}','App\Http\Controllers\AreaController@show')->name('areas.show');
Route::apiResource('areas', 'App\Http\Controllers\AreaController');
