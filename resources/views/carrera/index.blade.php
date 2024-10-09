@extends('layout.app')
@section('titulo','TVU Carreras')

@section('content')
    <div>
        <h1><center>Carreras de TVU</center></h1>
    </div>
    <a href={{ route('carrera.create') }}>Añadir Carrera</a>
    <br>

    <table border="1">  
        <thead>
            <tr>
                <th>Título</th>
                <th colspan="2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carreras as $carrera)
                <tr>
                    <td>{{ $carrera->nombre_carrera }}</td>
                    <td>
                        <a href={{ route('carrera.edit', [$carrera]) }}>Editar</a>
                    </td>
                    <td>
                        {{--<a href="">Eliminar</a>
                        <form action="{{route('carrera.destroy', [$carrera])}}" method="post">
                            @csrf
                            @method('DELETE');
                            <button type="submit">Eliminar carrera</button>
                        </form>--}}
                        <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                            Eliminar
                        </a>
                        
                        <form id="delete-form" action="{{ route('carrera.destroy', [$carrera]) }}" method="post" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection

{{-- <ul>
    @foreach ($carreras as $carrera)
        <li>
            <a href=""> 
                {{$carrera->nombre_carrera}}
            </a>
        </li>
    @endforeach
</ul> --}}