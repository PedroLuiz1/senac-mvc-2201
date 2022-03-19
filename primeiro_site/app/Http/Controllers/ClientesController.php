<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;

class ClientesController extends Controller
{
    public function __construct(){

        //Só usuário logado pode acessar
        //$this->middleware('auth');
    }

    public function listar() {
        $clientes = Clientes::all();

        return view('clientes.listar', ['clientes'=>$clientes]);
    }
}
