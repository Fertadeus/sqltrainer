@extends('layout')

@section('content')

@foreach($exercises as $course => $courseExercises)

    <h3 class="mt-4 mb-3 border-bottom pb-2">{{ $course }}</h3>

    <div class="list-group mb-4">
        @foreach($courseExercises as $exercise)
            <a href="{{ url('/ejercicio/'.$exercise->id) }}" 
               class="list-group-item list-group-item-action flex-column align-items-start">
                
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Ejercicio {{ $exercise->id }}</h5>
                    <small>Sin completar</small>
                </div>

                <p class="mb-1">{{ $exercise->subtitle }}</p>

            </a>
        @endforeach
    </div>

@endforeach

@endsection