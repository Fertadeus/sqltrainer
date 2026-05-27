@extends('layout')

@section('content')

<div class="container">
<div class="row justify-content-center">
    <div class="col-12 col-lg-9">

        <div class="mb-4" style="animation-delay:0.05s">
            <h2 style="font-family:var(--font-mono); font-weight:700; font-size:clamp(1.3rem,3vw,1.8rem); color:var(--text-primary);">
                Lista de ejercicios
            </h2>
        </div>

        @foreach($exercises as $course => $courseExercises)

            <div class="mb-5" style="animation-delay:0.1s">
                <p class="section-title">{{ $course }}</p>

                <div class="d-flex flex-column gap-2">
                    @foreach($courseExercises as $exercise)

                        <a href="{{ url('/ejercicio/'.$exercise->id) }}"
                           style="text-decoration:none; display:block;">
                            <div class="esqla-card py-3 px-4 d-flex align-items-center justify-content-between"
                                 style="cursor:pointer; transition: border-color 0.2s, transform 0.15s, box-shadow 0.2s;"
                                 onmouseover="this.style.borderColor='var(--accent)'; this.style.transform='translateX(4px)'; this.style.boxShadow='0 0 20px var(--accent-glow)';"
                                 onmouseout="this.style.borderColor='var(--border)'; this.style.transform=''; this.style.boxShadow='';">

                                <div class="d-flex align-items-center gap-3">
                                    

                                    <div>
                                        <div style="font-family:var(--font-mono); font-size:0.9rem; font-weight:700; color:var(--text-primary); margin-bottom:2px;">
                                            Ejercicio {{ $exercise->id }}
                                        </div>
                                        <div style="font-size:0.82rem; color:var(--text-secondary);">
                                            {{ $exercise->subtitle }}
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center gap-2">
                                    @if(in_array($exercise->id, $completed))
                                        <span style="font-family:var(--font-mono); font-size:0.7rem; font-weight:700; color:var(--accent); background:rgba(0,229,160,0.1); border:1px solid rgba(0,229,160,0.3); padding:3px 10px; border-radius:20px; letter-spacing:0.5px; white-space:nowrap;">
                                            ✓ COMPLETADO
                                        </span>
                                    @else
                                        <span style="font-family:var(--font-mono); font-size:0.7rem; color:var(--text-muted); background:var(--bg-elevated); border:1px solid var(--border); padding:3px 10px; border-radius:20px; letter-spacing:0.5px; white-space:nowrap;">
                                            PENDIENTE
                                        </span>
                                    @endif

                                    
                                </div>

                            </div>
                        </a>

                    @endforeach
                </div>
            </div>

        @endforeach

    </div>
</div>
</div>

@endsection