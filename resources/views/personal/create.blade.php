@extends('layout.app')
@section('titulo', 'Personal')

@section('content')
    <h1><center>Añadimos a un Personal</center></h1>
    <br><br>

    <form action="{{ route('personal.store') }}" method="post">
        @csrf

        <label>
            CI
            <input type="text" name="ci" value="{{old('ci')}}">
        </label>
        @error('ci')
            <p>{{$message}}</p>
        @enderror

        <label>
            Nombre
            <input type="text" name="nombre" value="{{old('nombre')}}">
        </label>
        @error('nombre')
            <p>{{$message}}</p>
        @enderror

        <label>
            Ap.Paterno
            <input type="text" name="paterno" value="{{old('paterno')}}">
        </label>
        @error('paterno')
            <p>{{$message}}</p>
        @enderror

        <label>
            Ap.Materno
            <input type="text" name="materno" value="{{old('materno')}}">
        </label>
        @error('materno')
            <p>{{$message}}</p>
        @enderror

        <br>
        <label>
            Correo
            <input type="email" name="correo" value="{{old('correo')}}">
        </label>
        @error('correo')
            <p>{{$message}}</p>
        @enderror

        <label>
            Celular
            <input type="text" name="celular" value="{{old('celular')}}">
        </label>
        @error('celular')
            <p>{{$message}}</p>
        @enderror

        <legend class="datos">Sexo</legend>
        <select name="sexo" id="">
            <option value="HOMBRE" {{ old('sexo') == 'HOMBRE' ? 'selected' : '' }}>HOMBRE</option>
            <option value="MUJER" {{ old('sexo') == 'TARDE' ? 'selected' : '' }}>MUJER</option>
        </select>

        <br>
        <label>
            Fecha de Inicio:
            <input type="date" name="fechaini" value="{{old('fechaini')}}">
        </label>
        @error('fechaini')
            <p>{{$message}}</p>
        @enderror

        <label>
            Fecha de Culminación
            <input type="date" name="fechafin" value="{{old('fechafin')}}">
        </label>
        @error('fechafin')
            <p>{{$message}}</p>
        @enderror
        <br>

        <label>
            Gestion
            <input type="text" name="gestion" value="{{old('gestion')}}">
        </label>
        @error('gestion')
            <p>{{$message}}</p>
        @enderror

        <legend class="datos">Turno</legend>
        <select name="turno" id="">
            <option value="MAÑANA" {{ old('turno') == 'MAÑANA' ? 'selected' : '' }}>MAÑANA</option>
            <option value="TARDE" {{ old('turno') == 'TARDE' ? 'selected' : '' }}>TARDE</option>
            <option value="COMPLETO" {{ old('turno') == 'COMPLETO' ? 'selected' : '' }}>TURNO COMPLETO</option>
        </select>

        <legend class="datos">Carrera</legend>
        <select name="carrera" id="">
            @foreach($carreras as $carrera)
                <option value="{{ $carrera->nombre_carrera}}" 
                    {{ old('carrera') == $carrera->nombre_carrera ? 'selected' : '' }}>
                    {{ $carrera->nombre_carrera }}
                </option>
            @endforeach
        </select>

        <legend class="datos">Area</legend>
        <select name="area" id="">
            @foreach($areas as $area)
                <option value="{{ $area->nombre_area }}" 
                    {{ old('area') == $area->nombre_area ? 'selected' : '' }}>
                    {{ $area->nombre_area }}
                </option>
            @endforeach
        </select>

        <legend class="datos">Relacion Laboral</legend>
        <select name="relacion_laboral" id="">
            @foreach($laboral as $laboral)
                <option value="{{ $laboral->relacion_laboral }}" 
                    {{ old('relacion_laboral') == $laboral->relacion_laboral ? 'selected' : '' }}>
                    {{ $laboral->relacion_laboral }}
                </option>
            @endforeach
        </select>

        <input id="" name="status" type="hidden" value="ACTIVO" />
        
        <br><br>
        <button type="submit">Añadir nuevo personal</button>
    </form>

@endsection