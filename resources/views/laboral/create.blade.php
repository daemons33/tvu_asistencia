@extends('layout.app')

@section('content')
    <h1><center>Añadir una nueva Relación Laboral</center></h1>
    <form action="{{ route('laboral.store') }}" method="post">
        @csrf
        <label>
            Nombre de la relación laboral: <br>
            <input type="text" name="relacion_laboral" value="{{old('relacion_laboral')}}">
        </label>
        @error('relacion_laboral')
            <p>{{$message}}</p>
        @enderror
        <br><br>
        <button type="submit">Añadir Relacion Laboral</button>
    </form>
@endsection