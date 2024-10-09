@extends('layout.app')

@section('content')
<h1><center>Asistencias del Pasante</center></h1>
<center>
    <table>
        <thead>
            <th>CI</th>
            <th>ENTRADA</th>
            <th>SALIDA</th>
            <th>HORAS TRABAJADAS</th>
            <th>OBS</th>
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
            <tr>
                <td colspan="3"><center><strong>HORAS TRABAJADAS ACUMULADAS</strong></center></td>
                <td colspan="4"><center><strong>{{$Horas_acumuladas}}</strong></center></td>
            </tr>
        </tbody>
    </table>
    </center>
@endsection