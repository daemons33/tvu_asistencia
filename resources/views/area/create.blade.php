@extends('layout.app')
@section('titulo', 'Area')

@section('content')
    <h1><center>Añadir una nueva Área</center></h1>
    <form action="{{ route('area.store') }}" method="post">
        @csrf
        <label>
            Nombre del Área: <br>
            <input type="text" name="nombre_area" value="{{old('nombre_area')}}">
        </label>
        @error('nombre_area')
            <p>{{$message}}</p>
        @enderror
        <br><br>
        <button type="submit">Añadir Área</button>
    </form>
@endsection