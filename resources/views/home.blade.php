@extends('layout.app')

@section('titulo', 'Control TVU')

@section('content')
    <div>
        <center><h1>Bienvenido a la página de asistencia de TV UMSA</h1></center>
    </div>

    <a href={{ route('carrera.index') }}>Nos vamos a las carreras.</a> <br> <br>
    <a href={{ route('area.index') }}>Nos vamos a las áreas.</a><br> <br>
    <a href={{ route('laboral.index') }}>Nos vamos a las relaciones Laborales.</a>

@endsection