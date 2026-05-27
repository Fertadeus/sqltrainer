@extends('layout')

@section('content')


<!--CORE DE LA PÁGINA // ENUNCIADO/EDITORSQL/RESULTADO-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-xl-10">




        <!-- ENUNCIADO // SOLO OCURRE SI NO ESTÁ EN FREE MODE -->
            @if(!($freeMode ?? false))
                <div class="esqla-card mb-4" style="animation-delay:0.05s; border-left: 3px solid var(--accent);">
                    <p class="section-title" style="margin-bottom:0.75rem;">enunciado</p>

                    <div style="color:var(--text-secondary); font-size:0.92rem; line-height:1.75; text-align:justify;">
                        {!! $exercise->description !!}
                    </div>
                </div>
            @endif




        <!-- EDITOR SQL -->
            <div class="esqla-card mb-4" style="animation-delay:0.1s;">

                <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
                    <p class="section-title" style="margin:0; flex:1;">editor sql</p>

                    <span style="font-family:var(--font-mono); font-size:0.7rem; color:var(--text-muted); background:var(--bg-elevated); border:1px solid var(--border); padding:3px 10px; border-radius:6px;">
                        SELECT ...
                    </span>
                </div>

                <div style="background:var(--bg-elevated); border:1px solid var(--border); border-bottom:none; border-radius:var(--radius) var(--radius) 0 0; padding:8px 14px; display:flex; align-items:center; gap:6px;">
                    <span style="width:10px;height:10px;border-radius:50%;background:var(--accent-red);display:inline-block;"></span>
                    <span style="width:10px;height:10px;border-radius:50%;background:var(--accent-yellow);display:inline-block;"></span>
                    <span style="width:10px;height:10px;border-radius:50%;background:var(--accent);display:inline-block;"></span>

                    <span style="font-family:var(--font-mono); font-size:0.7rem; color:var(--text-muted); margin-left:8px;">
                        query.sql
                    </span>
                </div>

                <textarea
                    id="sql"
                    class="form-control"
                    rows="7"
                    placeholder="Escribe aquí tu consulta SELECT..."
                    style="border-radius:0 0 var(--radius) var(--radius); border-top:none;"
                ></textarea>

                <div class="d-flex flex-wrap gap-2 mt-3">
                    <button id="runQuery" class="btn-accent">
                        ▶ Comprobar
                    </button>

                    @if(!($freeMode ?? false))
                        <button id="showSolution" class="btn-neutral">
                            Mostrar solución
                        </button>
                    @endif

                    <div id="nextBtnContainer" class="d-inline-flex align-items-center"></div>
                </div>
            </div>




            <!-- ÁREA DE RESULTADO -->
            <div class="esqla-card" style="animation-delay:0.15s;">
                <p class="section-title" style="margin-bottom:0.75rem;">resultado</p>

                <div id="resultBox" style="min-height:120px; font-size:0.875rem;">
                    <span style="color:var(--text-muted); font-family:var(--font-mono); font-size:0.8rem;">
                        Ejecuta una consulta para ver el resultado
                    </span>
                </div>
            </div>

        </div>
    </div>
</div>





               <!-- MODAL-->


<div class="modal fade" id="alerta" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">¡Enhorabuena!</h5>
            </div>

            <div class="modal-body" id="alertaBody"></div>
            <div class="modal-footer" id="alertaFooter"></div>

        </div>
    </div>
</div>


<!-- JAVASCRIPT -->

<script>
document.addEventListener('DOMContentLoaded', () => {

    const runBtn = document.getElementById('runQuery'); //Botón de comprobar
    const sqlInput = document.getElementById('sql'); //Recuadro de consultas SQL
    const resultBox = document.getElementById('resultBox'); //Recuadro de resultado
    const nextBtnContainer = document.getElementById('nextBtnContainer'); //Botón de siguiente ejercicio (o al menos, donde va a ir si aciertan la respuesta)

    const toggle = document.getElementById('tabToggle'); //Botón de mostrar tablas
    const drawer = document.getElementById('tablesDrawer'); //drawer del botón de mostrar tablas
    const content = document.getElementById('tablesContent'); //todo la info de mostrar tablas

    let loaded = false; //Y esto está hecho para que el tema del drawer no cargue antes que el resto de la página. Si no, peta.

    /*
     EJECUTAR QUERY

     Aquí incluye el uso de fetch API. Primero, tengo dos funciones en el controller, dependiendo de si estoy en free mode o no. 
     Si hay un error, muestra el error de que te haya devuelto el fetch. Esto puedo cambiarlo y mostrar un error genérico, pero no me decido completamente.
     Si la consulta no devuelve datos pero está bien, te lo dice. 

    */ 

    if (runBtn) {
        runBtn.addEventListener('click', async () => {

            const sql = sqlInput.value;

            let url = '';

            @if(isset($freeMode) && $freeMode)
                url = "{{ route('free.run') }}";
            @else
                url = "/ejercicio/{{ $exercise->id }}/run";
            @endif

            try {

                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ query: sql })
                });

                const data = await response.json();

                if (data.error) {
                    resultBox.innerHTML = `
                        <div class="alert alert-danger mb-0">
                            ${data.error}
                        </div>
                    `;
                    return;
                }


                if (!data.result || data.result.length === 0) {
                    resultBox.innerHTML = `
                        <span style="color:var(--text-muted); font-family:var(--font-mono); font-size:0.8rem;">
                            — Consulta ejecutada correctamente, sin resultados.
                        </span>
                    `;
                    return;
                }

                //TODO ESTO ES CONSTRUCCIÓN DE LA TABLA

                const columns = Object.keys(data.result[0]);

                let table = `
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                `;

                columns.forEach(col => {
                    table += `<th>${col}</th>`;
                });

                table += `
                            </tr>
                        </thead>
                        <tbody>
                `;

                data.result.forEach(row => {
                    table += '<tr>';

                    columns.forEach(col => {
                        table += `<td>${row[col]}</td>`;
                    });

                    table += '</tr>';
                });

                table += `
                        </tbody>
                    </table>
                `;

                resultBox.innerHTML = `
                    <div class="table-responsive">
                        ${table}
                    </div>
                `;

                //HASTA AQUÍ, A PARTIR DE AQUÍ COMPRUEBA SI EL OBJETO DATA TIENE QUE ESTÁ CORRECTO; Y SI LO ESTÁ MUESTRA EL MODAL
                if (data.correct) {
                    mostrarModal();

                    if (!document.getElementById('nextExerciseBtn')) {

                        const btn = document.createElement('a');

                        btn.id = 'nextExerciseBtn';
                        btn.className = 'btn-neutral';
                        btn.innerText = 'Siguiente ejercicio →';

                        @if(!($freeMode ?? false))
                            btn.href = "/ejercicio/{{ $exercise->id + 1 }}";
                        @endif

                        nextBtnContainer.appendChild(btn);
                    }
                }

            } catch (error) {

                console.error(error);

                resultBox.innerHTML = `
                    <div class="alert alert-danger mb-0">
                        Error en la petición AJAX
                    </div>
                `;
            }
        });
    }


    // 
    // MODAL
    // 

    function mostrarModal() {

        const modalEl = document.getElementById('alerta');

        @if(!($freeMode ?? false) && isset($nextExercise) && $nextExercise)

            document.getElementById('alertaBody').innerHTML =
                'Respuesta correcta. ¿Quieres pasar al siguiente ejercicio?';

            document.getElementById('alertaFooter').innerHTML = `
                <button type="button" class="btn-neutral" id="btnCerrarModal">
                    Cerrar
                </button>

                <a href="/ejercicio/{{ $exercise->id + 1 }}" class="btn-accent">
                    Siguiente ejercicio →
                </a>
            `;

        @else

            document.getElementById('alertaBody').innerHTML =
                'Has completado todos los ejercicios. ¡Espero que te hayan servido de ayuda!';

            document.getElementById('alertaFooter').innerHTML = `
                <button type="button" class="btn-neutral" id="btnCerrarModal">
                    Cerrar
                </button>

                <a href="{{ url('/') }}" class="btn-accent">
                    Volver al menú →
                </a>
            `;

        @endif

        const modal = new bootstrap.Modal(modalEl);

        const closeBtn = document.getElementById('btnCerrarModal');

        if (closeBtn) {
            closeBtn.onclick = () => modal.hide();
        }

        modal.show();
    }


    // 
    // MOSTRAR SOLUCIÓN
    // 

    const showBtn = document.getElementById('showSolution');

    if (showBtn) {
        showBtn.addEventListener('click', () => {

            @if(!isset($freeMode) || !$freeMode)
                sqlInput.value = @json($exercise->expected_sql);
            @endif
        });
    }


    // 
    // DRAWER TABLAS
    //

    if (toggle && drawer && content) {

        toggle.addEventListener('click', async () => {

            drawer.classList.toggle('open');

            if (!loaded && drawer.classList.contains('open')) {

                try {

                    const response = await fetch('/tables');
                    const data = await response.json();

                    let html = '';

                    for (const table in data) {

                        html += `
                            <div class="mb-3">
                                <strong>${table}</strong>
                                <div>
                                    ${data[table].map(col => `
                                        <span class="badge bg-primary me-1">
                                            ${col}
                                        </span>
                                    `).join('')}
                                </div>
                            </div>
                        `;
                    }

                    content.innerHTML = html;
                    loaded = true;

                } catch (error) {

                    console.error(error);

                    content.innerHTML = `
                        <div class="alert alert-danger">
                            Error cargando tablas
                        </div>
                    `;
                }
            }
        });


        document.addEventListener('click', function (event) {

            const isClickInsideDrawer = drawer.contains(event.target);
            const isClickOnToggle = toggle.contains(event.target);
            const isClickOnSQL = sqlInput.contains(event.target);

            if (!isClickInsideDrawer && !isClickOnToggle && !isClickOnSQL) {
                drawer.classList.remove('open');
            }
        });
    }
});
</script>
@endsection



<!-- OTRA SECCIÓN // MOSTRAR TABLAS // SI NO LA PONGO AQUÍ ENTRA EN CONFLICTO CON EL RESTO DE CONTAINERS Y SE VA A LA MIERDA -->
@section('fixed')
<div id="tabToggle">
    <span id="tabText">Mostrar tablas</span>
</div>

<div id="tablesDrawer">
    <h5>Tablas disponibles</h5>
    <div id="tablesContent"></div>
</div>
@endsection