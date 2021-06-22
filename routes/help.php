Route::get('/inventario','App\Http\Controllers\InventaryController@index')->name('inventario.index');
Route::get('/inventario/all','App\Http\Controllers\InventaryController@showall')->name('inventario.showall');
Route::get('/inventario/editar/{id}','App\Http\Controllers\InventaryController@showedit')->name('inventario.edit');
Route::get('/inventario/detalleone/{id}','App\Http\Controllers\InventaryController@showone')->name('inventario.nuevo');
Route::get('/inventario/agregar','App\Http\Controllers\InventaryController@create')->name('inventario.create');
Route::get('/inventario/detalle/{id}','App\Http\Controllers\InventaryController@show')->name('inventario.show');
Route::apiResource('inventario', 'App\Http\Controllers\InventaryController');
