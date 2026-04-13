@extends('layout')

@section('content')
<ul>
    @foreach($exercises as $exercise)
        <a href="{{ url('/ejercicio/'.$exercise->id) }}" class="link-primary"><li>Ejercicio {{$exercise->id}}</li></a>
    @endforeach
</ul>
@endsection