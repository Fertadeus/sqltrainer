@extends('layout')

@section('content')
<div class="container mt-4">

    <h1 class="mb-4 text-center mb-5">Ejercicio {{ $exercise->id }}</h1>

    <h4>Enunciado</h4>
    <p class="mb-5">{{ $exercise->description }}</p>

    <h4 class="mt-4">Tu consulta SQL</h4>
    <textarea id="sql" class="form-control" rows="6" placeholder="Escribe aquí tu consulta SELECT..."></textarea>

    <button id="runQuery" class="btn btn-primary mt-3 mb-5">Comprobar</button>

    <h4 class="mt-2">Resultado</h4>
    <div id="resultBox" class="border rounded p-3 bg-light" style="min-height: 120px;">
        <em>Ejecuta una consulta para ver el resultado.</em>
    </div>

</div>

<script>
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
        const box = document.getElementById('resultBox');

        if (data.error) {
            box.innerHTML = `<div class="alert alert-danger mb-0">${data.error}</div>`;
            return;
        }

        // Mostrar resultado en JSON (luego lo convertiré a tabla)
        box.innerHTML = `<pre class="mb-0">${JSON.stringify(data.result, null, 2)}</pre>`;

        if (data.correct) {
            alert('¡Enhorabuena! Has resuelto correctamente el ejercicio.');
        }
    })
    .catch(error => {
    console.error(error);
    document.getElementById('resultBox').innerHTML =
        `<div class="alert alert-danger mb-0">Error en la petición AJAX</div>`;
    });
});
</script>
@endsection
