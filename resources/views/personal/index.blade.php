@extends('layout.app')
@section('titulo', 'Personal')

@section('content')
    <h1><center>Personal de TVU</center></h1>
    <br><br>
    <a href="{{ route('personal.create') }}">Añadir un nuevo Personal</a>

    <table>
        <thead>
            <th>CI</th>
            <th>NOMBRE</th>
            <th>AP.PATERNO</th>
            <th>AP.MATERNO</th>
            <th>CORREO</th>
            <th>CELULAR</th>
            <th>SEXO</th>
            <th>FECHAINI</th>
            <th>FECHAFIN</th>
            <th>GESTION</th>
            <th>TURNO</th>
            <th>CARRERA</th>
            <th>AREA</th>
            <th>RELACION LABORAL</th>
            <th>STATUS</th>
            <th colspan="2">ACCIONES</th>
        </thead>
        <tbody>
            @foreach ($personal as $personal)
                <tr>
                    <td>{{$personal->ci}}</td>
                    <td>{{$personal->nombre}}</td>
                    <td>{{$personal->paterno}}</td>
                    <td>{{$personal->materno}}</td>
                    <td>{{$personal->correo}}</td>
                    <td>{{$personal->celular}}</td>
                    <td>{{$personal->sexo}}</td>
                    <td>{{$personal->fechaini}}</td>
                    <td>{{$personal->fechafin}}</td>
                    <td>{{$personal->gestion}}</td>
                    <td>{{$personal->turno}}</td>
                    <td>{{$personal->carrera}}</td>
                    <td>{{$personal->area}}</td>
                    <td>{{$personal->relacion_laboral}}</td>
                    <td>{{$personal->status}}</td>
                    <td>
                        <a href="{{ route('personal.edit', [$personal]) }}">Editar</a>
                    </td>
                    <td>
                        <form id="delete-form-personal-{{$personal->id}}" action="{{ route('personal.destroy', [$personal]) }}" method="post" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                        <button type="button" onclick="if(confirm('¿Estás seguro de que deseas eliminar este registro?')) { event.preventDefault(); document.getElementById('delete-form-personal-{{$personal->id}}').submit(); }" style="background:none; border:none; color:#007bff; text-decoration:underline; cursor:pointer;">
                            Eliminar
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection