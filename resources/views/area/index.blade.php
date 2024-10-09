@extends('layout.app')
@section('titulo', 'Area')

@section('content')
    <div>
        <h1><center>Asistencias de TVU UMSA</center></h1>
    </div>
    <a href="{{ route('area.create') }}">Añadir Area</a> <br>

    <table>
        <thead>
            <th>AREA</th>
            <th colspan="2">ACCIONES</th>
        </thead>
        <tbody>
            @foreach ($areas as $area)
                <tr>
                    <td>{{$area->nombre_area}}</td>
                    <td>
                        <a href="{{ route('area.edit', [$area]) }}">Editar</a>
                    </td>
                    <td>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form-area-{{$area->id}}').submit();">
                            Eliminar
                        </a>
                        
                        <form id="delete-form-area-{{$area->id}}" action="{{ route('area.destroy', [$area]) }}" method="post" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection