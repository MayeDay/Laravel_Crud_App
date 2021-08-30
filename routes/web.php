<?php
use App\Http\Controllers\EmployeeController;

use Illuminate\Support\Facades\Route;

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
  return view('welcome',);
});

Route::get('/',[EmployeeController::class, 'getEmployee']);

Route::get('/{id}',[EmployeeController::class, 'getEmployeeId']);

Route::post('api/addEmployee', [EmployeeController::class, 'addEmployee']);

Route::post('updateEmployee/{id}', [EmployeeController::class, 'updateEmployee']);

Route::post('deleteEmployee/{id}', [EmployeeController::class, 'deleteEmployee']);