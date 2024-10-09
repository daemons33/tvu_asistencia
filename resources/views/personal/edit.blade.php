@extends('layout.app')
@section('titulo', 'Personal')

@section('content')
    <h1><center>Editamos a un Personal</center></h1>
    <br><br>

    <form action="{{route('personal.update', [$personal])}}" method="post">
        @csrf
        @method('PUT')

        <label>         
            CI
            <input type="text" name="ci" value="{{old('ci', $personal->ci)}}">
        </label>
        @error('ci')
            <p>{{$message}}</p>
        @enderror
        <br>

        <label>
            Nombre
            <input type="text" name="nombre" value="{{old('nombre', $personal->nombre)}}">
        </label>
        @error('nombre')
            <p>{{$message}}</p>
        @enderror
        <br>

        <label>
            Ap.Paterno
            <input type="text" name="paterno" value="{{old('paterno', $personal->paterno)}}">
        </label>
        @error('paterno')
            <p>{{$message}}</p>
        @enderror
        <br>

        <label>
            Ap.Materno
            <input type="text" name="materno" value="{{old('materno', $personal->materno)}}">
        </label>
        @error('materno')
            <p>{{$message}}</p>
        @enderror

        <br>
        <label>
            Correo
            <input type="email" name="correo" value="{{old('correo', $personal->correo)}}">
        </label>
        @error('correo')
            <p>{{$message}}</p>
        @enderror

        <br>
        <label>
            Celular
            <input type="text" name="celular" value="{{old('celular', $personal->celular)}}">
        </label>
        @error('celular')
            <p>{{$message}}</p>
        @enderror

        <br>
        <legend class="datos">Sexo</legend>
        <select name="sexo" id="">
            <option value="HOMBRE" {{ old('sexo', $personal->sexo) == 'HOMBRE' ? 'selected' : '' }}>HOMBRE</option>
            <option value="MUJER" {{ old('sexo', $personal->sexo) == 'MUJER' ? 'selected' : '' }}>MUJER</option>
        </select>

        <br>
        <label>
            Fecha de Inicio:
            <input type="date" name="fechaini" value="{{old('fechaini', $personal->fechaini)}}">
        </label>
        @error('fechaini')
            <p>{{$message}}</p>
        @enderror

        <br>
        <label>
            Fecha de Culminación
            <input type="date" name="fechafin" value="{{old('fechafin', $personal->fechafin)}}">
        </label>
        @error('fechafin')
            <p>{{$message}}</p>
        @enderror
        <br>

        <label>
            Gestion
            <input type="text" name="gestion" value="{{old('gestion', $personal->gestion)}}">
        </label>
        @error('gestion')
            <p>{{$message}}</p>
        @enderror

        <br>
        <legend class="datos">Turno</legend>
        <select name="turno" id="">
            <option value="MAÑANA" {{ old('turno', $personal->turno) == 'MAÑANA' ? 'selected' : '' }}>MAÑANA</option>
            <option value="TARDE" {{ old('turno', $personal->turno) == 'TARDE' ? 'selected' : '' }}>TARDE</option>
            <option value="COMPLETO" {{ old('turno', $personal->turno) == 'COMPLETO' ? 'selected' : '' }}>TURNO COMPLETO</option>
        </select>
        
        <br>
        <legend class="datos">Carrera</legend>
        <select name="carrera" id="">
            @foreach($carreras as $carrera)
                <option value="{{ $carrera->nombre_carrera}}" 
                    {{ old('carrera', $personal->carrera) == $carrera->nombre_carrera ? 'selected' : '' }}>
                    {{ $carrera->nombre_carrera }}
                </option>
            @endforeach
        </select>

        <br>
        <legend class="datos">Area</legend>
        <select name="area" id="">
            @foreach($areas as $area)
                <option value="{{ $area->nombre_area }}" 
                    {{ old('area', $personal->area) == $area->nombre_area ? 'selected' : '' }}>
                    {{ $area->nombre_area }}
                </option>
            @endforeach
        </select>

        <br>
        <legend class="datos">Relacion Laboral</legend>
        <select name="relacion_laboral" id="">
            @foreach($laboral as $laboral)
                <option value="{{ $laboral->relacion_laboral }}" 
                    {{ old('relacion_laboral', $personal->relacion_laboral) == $laboral->relacion_laboral ? 'selected' : '' }}>
                    {{ $laboral->relacion_laboral }}
                </option>
            @endforeach
        </select>

        <br>
        <legend class="datos">Status</legend>
        <select name="status" id="">
            <option value="ACTIVO" {{ old('status', $personal->status) == 'ACTIVO' ? 'selected' : '' }}>ACTIVO</option>
            <option value="INACTIVO" {{ old('status', $personal->status) == 'INACTIVO' ? 'selected' : '' }}>INACTIVO</option>
            <option value="PENDIENTE" {{ old('status', $personal->status) == 'PENDIENTE' ? 'selected' : '' }}>PENDIENTE</option>
        </select>

        <br><br>
        <button type="submit">Actualizar</button>

@endsection