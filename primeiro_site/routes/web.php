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

Route::get('/avisos', function () {
    return view('avisos',['nome' => 'Pedro', 
                        'mostrar' => true,
                         'avisos' => [[ 'id' => 1, 'aviso' => 'aviso 1'],
                                     ['id' => 2,  'aviso' => 'aviso 2'],
                                    ['id' => 3, 'aviso' => 'aviso3']]]);
});

Route::get('/cadastro', function() {
    return view('cadastro',['itens' => [[ 'id' => 1, 'item' => 'produto 1', 'desc' => 'descricao um', 'price' => 'R$20,00'],
                                        ['id' => 2,  'item' => 'produto 2', 'desc' => 'descricao dois', 'price'=> 'R$45,00'],
                                        ['id' => 3, 'item' => 'produto 3', 'desc' => 'descricao tres', 'price'=> 'R$60,00']]]);
});
