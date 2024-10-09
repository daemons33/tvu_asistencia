@extends('layout.app')
@section('titulo', 'Carrera')

@section('content')
<h1><center>Editamos la Carrera:</center></h1>
<form action={{ route('carrera.update',[$carrera])}} method="POST">
    @csrf
    @method('PUT')
    <label>
        Nombre de la Carrera: <br>
        <input type="text" name="nombre_carrera" value="{{old('nombre_carrera', $carrera->nombre_carrera)}}">
    </label>
    @error('nombre_carrera')
        <p>{{$message}}</p>
    @enderror
    <br><br>
    <button type="submit">Actualizar Carrera</button>
</form>
    
@endsection