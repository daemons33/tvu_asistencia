@extends('layout.app')

@section('content')


<div>
    <h1><center>ASISTENCIAS DEL PERSONAL DE TVU-UMSA</center></h1>
</div>
<br>
<a href="{{ route('asistencia.create') }}">MARCAR</a>
<br>
<center>
<table>
    <thead>
        <th>CI</th>
        <th>ENTRADA</th>
        <th>SALIDA</th>
        <th>HORAS TRABAJADAS</th>
        <th>OBSERVACIONES</th>
        <th colspan="2">ACCIONES</th>
    </thead>
    <tbody>
        @foreach ($asistencias as $asistencia)
            <tr>
                <td>{{$asistencia->ci}}</td>
                <td>{{$asistencia->entrada}}</td>
                <td>{{$asistencia->salida}}</td>
                <td><center>{{$asistencia->hora_dia}}</center></td>
                <td>{{$asistencia->observaciones}}</td>
                <td><a href="{{ route('asistencia.edit', [$asistencia]) }}">Editar</a></td>
                <td>
                    <form id="delete-form-asistencia-{{$asistencia->id}}" action="{{ route('asistencia.destroy', [$asistencia]) }}" method="post" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                    <button type="button" onclick="if(confirm('¿Estás seguro de que deseas eliminar este registro?')) { event.preventDefault(); document.getElementById('delete-form-asistencia-{{$asistencia->id}}').submit(); }" style="background:none; border:none; color:#007bff; text-decoration:underline; cursor:pointer;">
                        Eliminar
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</center>

<br></br> 
<form action="{{ route('asistencia.show') }}" method="get">
    <label>N° de CARNET</label>
    <input type="text" name="ci" id="">
    <input type="submit" value="Buscar">
    
    @if (session('error'))
        <div style="color: red;">
            {{ session('error') }}
        </div>
    @endif
</form>

<br><br>


@endsection


