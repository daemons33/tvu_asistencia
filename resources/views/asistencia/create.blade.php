@extends('layout.app')

@section('content')
    <h1><center>MARCAR</center></h1>
    <form action="{{route('asistencia.store')}}" method="post">
        @csrf
        <label>N° de CARNET</label>
        <input type="text" name="ci" id="">
        @error('ci')
            <p>{{$message}}</p>
        @enderror
        @if (session('error'))
            <div style="color: red;">
                {{ session('error') }}
            </div>
        @endif

        <input type="submit" value="MARCAR">
    </form>
@endsection