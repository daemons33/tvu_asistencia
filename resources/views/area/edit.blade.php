@extends('layout.app')
@section('titulo' , 'Area')

@section('content')
    <h2><center>Editamos el Área</center></h2>
    <form action="{{ route('area.update', [$area]) }}" method="POST">
        @csrf
        @method('PUT')
        <label>
            Nombre del Área: <br>
            <input type="text" name="nombre_area" value="{{old('nombre_area', $area->nombre_area)}}">
        </label>
        @error('nombre_area')
            <p>{{$message}}</p>
        @enderror
        <br><br>
        <button type="submit">Actualizar Área</button>
    </form>
@endsection