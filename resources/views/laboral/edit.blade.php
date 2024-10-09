@extends('layout.app')

@section('content')
    <h2><center>Editamos la Relación Laboral</center></h2>
    <form action="{{ route('laboral.update', [$laboral]) }}" method="POST">
        @csrf
        @method('PUT')
        <label>
            Nombre de la Relación laboral: <br>
            <input type="text" name="relacion_laboral" value="{{old('relacion_laboral', $laboral->relacion_laboral)}}">
        </label>
        @error('relacion_laboral')
            <p>{{$message}}</p>
        @enderror
        <br><br>
        <button type="submit">Actualizar Relacion Laboral</button>
    </form>
@endsection