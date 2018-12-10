 <?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


 Route::group(['middleware' => ['auth']], function () {
     Route::get('/', 'HomeController@index')->name('home');
     Route::resource('vehicle-model', 'VehicleModelController');
     Route::resource('vehicle-image', 'VehicleImageController');
     Route::resource('manufacturer', 'ManufacturerController');
     Route::get('vehicles/datatable', ['as' => 'vehicles.datatable', 'uses' => 'VehicleModelController@datatable']);
     Route::get('vehicle-model/{vehicle_id}/images', ['as' => 'vehicles.images', 'uses' => 'VehicleModelController@images']);
     Route::post('vehicles/image_upload/{vehicle_id}', ['as' => 'vehicles.image_upload', 'uses' => 'VehicleModelController@image_upload']);

 });