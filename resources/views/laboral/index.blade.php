@extends('layout.app')

@section('content')
    <div>
        <h1><center>Las Relaciones Laborales en TVU</center></h1>
    </div>

    <a href="{{ route('laboral.create')}}">Añadir una nueva relación laboral</a>
    <br> <br>
    <table>
        <thead>
            <th>RELACIÓN LABORAL</th>
            <th colspan="2">ACCIONES</th>
        </thead>
        <tbody>
            @foreach ($laborales as $laboral)
                <tr>
                    <td>{{$laboral->relacion_laboral}}</td>
                    <td>
                        <a href="{{ route('laboral.edit', [$laboral]) }}">Editar</a>
                    </td>
                    <td>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form-laboral-{{$laboral->id}}').submit();">
                            Eliminar
                        </a>
                        
                        <form id="delete-form-laboral-{{$laboral->id}}" action="{{ route('laboral.destroy', [$laboral]) }}" method="post" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection