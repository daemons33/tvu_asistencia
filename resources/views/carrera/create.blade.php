@extends('layout.app')
@section('titulo','Carrera')

@section('content')
    <h1><center>Añadir nueva Carrera:</center></h1>
    <form action={{ route('carrera.store') }} method="POST">
        @csrf
        <label>
            Nombre de la Carrera: <br>
            <input type="text" name="nombre_carrera" value="{{old('nombre_carrera')}}">
        </label>
        @error('nombre_carrera')
            <p>{{$message}}</p>
        @enderror
        <br><br>
        <button type="submit">Añadir Carrera</button>
    </form>
@endsection