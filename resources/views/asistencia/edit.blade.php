@extends('layout.app')

@section('content')
    <h2><center>EDITAMOS HORARIOS</center></h2>

    <form action="{{ route('asistencia.update', [$asistencia]) }}" method="post">
        @csrf
        @method('PUT')

        <label for="ci">
            N° de Carnet: <br>
            <input type="text" name="ci" value="{{old('ci', $asistencia->ci)}}">
        </label>
        <label for="entrada">
            Entrada: 
            <input type="datetime-local" name="entrada" value="{{old('entrada', $asistencia->entrada)}}">
        </label>
        <label for="salida">
            Entrada: 
            <input type="datetime-local" name="salida" value="{{old('salida', $asistencia->salida)}}">
        </label>
        <label for="observaciones">
            Observaciones: 
            <input type="text" name="observaciones" value="{{old('observaciones', $asistencia->observaciones)}}">
        </label>
        <input type="submit" value="Editar">
    </form>
@endsection