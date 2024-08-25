@extends('layouts.app')

@section('titulo','Mis Carros')

@section('contenido')
     <h1>LISTA DE CARROS</h1>
     <ul>
         @foreach ($carros as $carro)
         <li>{{$carro->nombre}} - Precio:{{$carro->precio}}</li>
         @endforeach
     </ul>
@endsection     