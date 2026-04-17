@extends('layout')

@section('content')
<div class="container mt-4">

    <h1 class="mb-4 text-center mb-5">Ejercicio {{ $exercise->id }}</h1>

    <h4>Enunciado</h4>
    <p class="mb-5" style="text-align:justify;">{!! $exercise->description !!}</p>

    <h4 class="mt-4">Tu consulta SQL</h4>
    <textarea id="sql" class="form-control" rows="6" placeholder="Escribe aquí tu consulta SELECT..."></textarea>

    <button id="runQuery" class="btn btn-primary mt-3 mb-5">Comprobar</button>
    <button id="showSolution" class="btn btn-success mt-3 mb-5">Mostrar solución</button>

    <h4 class="mt-2">Resultado</h4>
    <div id="resultBox" class="border rounded p-3 bg-light" style="min-height: 120px;">
        <em>Ejecuta una consulta para ver el resultado.</em>
    </div>
</div>

<!--ALERTA SI SE COMPLETA BIEN EL ENUNCIADO-->

@if($nextExercise)
    <div class="modal fade" id="alerta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">¡Enhorabuena!</h5>
        </div>
        <div class="modal-body">
            Respuesta correcta. ¿Quieres pasar al siguiente ejercicio?
        </div>
        <div class="modal-footer">
            <button type="button" id="botonCerrar" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <form action="{{ url('/ejercicio/'.$exercise->id+1) }}"><button type="submit" id="botonSiguiente" class="btn btn-primary">Siguiente ejercicio</button></form>
        </div>
        </div>
    </div>
    </div>
@else
    <div class="modal fade" id="alerta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">¡Enhorabuena!</h5>
        </div>
        <div class="modal-body">
            Has completado todos los ejercicios. ¡Espero que te hayan servido de ayuda!
        </div>
        <div class="modal-footer">
            <button type="button" id="botonCerrar" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <form action="{{ url('/')}}"><button type="submit" id="botonSiguiente" class="btn btn-primary">Volver al menú principal</button></form>
        </div>
        </div>
    </div>
    </div>
@endif

<!--FIN DE ALERTA SI SE COMPLETA BIEN EL ENUNCIADO-->
<script>

//BOTÓN DE COMPROBAR

document.getElementById('runQuery').addEventListener('click', function () {
    const sql = document.getElementById('sql').value;

    /*No sabría reescribir esto ni aunque me mataran, pero básicamente, llama a la función del controlador.
      El resto de cosas es para que funcione esta tecnología de mierda. La respuesta tiene que ser en json.
      Si lo es, mira varias cosas:
        - Si hay un error, te dice cuál en el cuadro resultado (TENGO QUE CAMBIAR ESTO, PERO DE MOMENTO ME VIENE BIEN PARA ENCONTRAR ERRORES)
        - Si todo sale bien, muestra el resultado en el cuadro resultado
        - Si el data viene con el correct == true, te muestra una alerta de que lo has hecho bien
    */

    fetch('{{ route('exercise.run', $exercise->id) }}', {
        method: 'POST',
        body: JSON.stringify({ query: sql }),
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(async res => {
        const text = await res.text();

        try {
            return JSON.parse(text);
        } catch (e) {
            throw new Error("Respuesta no es JSON: " + text);
        }
    })
    .then(data => {


        // Mostrar resultado en Tablas (esto no sé hacerlo, mirarlo bien!! lo tabulo a la derecha para diferenciarlo del resto del código)

            const box = document.getElementById('resultBox');

            if (data.error) {
                box.innerHTML = `<div class="alert alert-danger mb-0">${data.error}</div>`;
                return;
            }

            

            if (!data.result || data.result.length === 0) {
                box.innerHTML = `<em>Consulta ejecutada correctamente, sin resultados.</em>`;
                return;
            }

            // columnas dinámicas
            const columns = Object.keys(data.result[0]);

            let table = `<table class="table table-bordered table-striped">
            <thead>
            <tr>`;

            columns.forEach(col => {
                table += `<th>${col}</th>`;
            });

            table += `</tr></thead><tbody>`;

            // filas
            data.result.forEach(row => {
                table += `<tr>`;
                columns.forEach(col => {
                    table += `<td>${row[col]}</td>`;
                });
                table += `</tr>`;
            });

            table += `</tbody></table>`;

            box.innerHTML = `<div class="table-responsive">${table}</div>`;

        //Si todo es correcto abre un modal y le añade al botón cerrar una función (por algún motivo no cierra si no hago esto xd)
        if (data.correct) {
            var alerta = new bootstrap.Modal(document.getElementById("alerta"));
            var botonCerrar = document.getElementById("botonCerrar").addEventListener("click", (event) => {
                alerta.toggle();
            }, {once : true});

            alerta.toggle();

        }
    })
    .catch(error => {
    console.error(error);
    document.getElementById('resultBox').innerHTML =
        `<div class="alert alert-danger mb-0">Error en la petición AJAX</div>`;
    });
});


/*
        BOTÓN MOSTRAR SOLUCIÓN

*/
document.getElementById('showSolution').addEventListener('click', function () {

    document.getElementById("sql").value = @json($exercise->expected_sql);
})

</script>
@endsection
