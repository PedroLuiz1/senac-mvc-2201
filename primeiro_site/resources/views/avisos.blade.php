@extends('layouts.externo')
@section('title', 'Minha primeira view')
@section('sidebar')
    @parent
    <hr>
@endsection
@section('content')
@if($mostrar)
    <div class="alert alert-danger" role="alert">
        ATENÇÃO: lembre dos avisos
    </div>
    @else
    <div></div>
    @endif
    <table class="table">
        <tr><td>Quadro de Avisos de {{$nome}}</td></tr>
        @foreach($avisos as $aviso)
        <tr><td>Aviso #{{$aviso['id']}}<br>{{$aviso['aviso']}}</td></tr>
        @endforeach
        <?php
        foreach($avisos as $aviso) {
            echo "<tr><td>Aviso #{$aviso['id']} <br>{$aviso['aviso']} </td></tr>\n";
        }
        ?>
    </table>
@endsection