<?php

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
    return view('welcome');
});

Route::get('/avisos', function (){
    return view('avisos',[  'nome' => 'Albertin', 
                            'mostrar' => true,
                            'avisos' => [   ['id' => 1, 'aviso' => 'Mussum Ipsum, cacilds vidis litro abertis'],
                                            ['id' => 2, 'aviso' => 'Em pé sem cair, deitado sem dormir'],
                                            ['id' => 3, 'aviso' => 'A ordem dos tratores não altera o pão duris']]]);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('clientes')->group(function (){

    Route::get('listar', 
                    [App\Http\Controllers\ClientesController::class,'listar']
                    )->middleware('auth');
});

Route::group(['middleware' => ['auth']], function(){
    Route::resource('/users', App\Http\Controllers\UserController::class);
    Route::resource('/roles', App\Http\Controllers\RoleController::class);
});