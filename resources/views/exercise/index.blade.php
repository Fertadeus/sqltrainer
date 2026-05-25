@extends('layout')

@section('content')

<div class="container">
<div class="row justify-content-center">
    <div class="col-12 col-lg-9">

        <div class="mb-4" style="animation-delay:0.05s">
            <p class="section-title">lista de ejercicios</p>
            <h2 style="font-family:var(--font-mono); font-weight:700; font-size:clamp(1.3rem,3vw,1.8rem); color:var(--text-primary);">
                Ejercicios SQL
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
                                    <!-- ID badge -->
                                    <span style="font-family:var(--font-mono); font-size:0.75rem; color:var(--text-muted); min-width:36px;">
                                        #{{ str_pad($exercise->id, 2, '0', STR_PAD_LEFT) }}
                                    </span>

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

                                    <span style="color:var(--text-muted); font-size:1rem;">→</span>
                                </div>

                            </div>
                        </a>

                    @endforeach
                </div>
            </div>

        @endforeach

    </div>
</div>
</div><!-- fin container -->

@endsection