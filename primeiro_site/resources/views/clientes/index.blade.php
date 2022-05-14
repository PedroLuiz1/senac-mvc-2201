@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Clientes</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('clients.create') }}"> + Novo Cliente</a>
        </div>
    </div>
</div>

<br>

@if ($message = Session::get('success'))

<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>

@endif


<table class="table table-bordered">

 <tr>
   <th>ID</th>
   <th>Nome</th>
   <th>Email</th>
   <th>Telefone</th>
   <th>Endereço</th>
   <th width="280px">Ação</th>
 </tr>

 @foreach ($clientes as $key => $cliente)

  <tr>
    <td>{{ $cliente->id }}</td>
    <td>{{ $cliente->nome }}</td>
    <td>{{ $cliente->email }}</td>
    <td>{{ $cliente->telefone }}</td>
    <td>{{ $cliente->endereco }}</td>

    <td>
       <a class="btn btn-info" href="{{ route('clients.show',$cliente->id) }}">Mostrar</a>
       <a class="btn btn-primary" href="{{ route('clients.edit',$cliente->id) }}">Editar</a>

        {!! Form::open(['method' => 'DELETE','route' => ['clients.destroy', $cliente->id],'style'=>'display:inline']) !!}

            {!! Form::submit('Apagar', ['class' => 'btn btn-danger']) !!}

        {!! Form::close() !!}

    </td>
  </tr>

 @endforeach

</table>

{!! $clientes->render() !!}

@endsection