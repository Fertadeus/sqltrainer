@extends('layout')

@section('content')

<div class="container mt-4">

    <h4 class="mb-3">Modo libre</h4>

    <textarea id="sql" class="form-control" rows="6"
        placeholder="Escribe tu consulta SQL..."></textarea>

    <button id="runQuery" class="btn btn-primary mt-3">
        Ejecutar
    </button>

    <div id="result" class="mt-4"></div>

</div>

@endsection



<script>
document.getElementById('runQuery').addEventListener('click', function () {

    const query = document.getElementById('sql').value;

    fetch("{{ route('free.run') }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ query: query })
    })
    .then(res => res.json())
    .then(data => {

        let html = '';

        if (!data.success) {
            html = `<div class="alert alert-danger">${data.error}</div>`;
        } else {

            if (data.result.length === 0) {
                html = '<p>No hay resultados</p>';
            } else {

                html += '<table class="table table-bordered"><thead><tr>';

                Object.keys(data.result[0]).forEach(col => {
                    html += `<th>${col}</th>`;
                });

                html += '</tr></thead><tbody>';

                data.result.forEach(row => {
                    html += '<tr>';
                    Object.values(row).forEach(val => {
                        html += `<td>${val}</td>`;
                    });
                    html += '</tr>';
                });

                html += '</tbody></table>';
            }
        }

        document.getElementById('result').innerHTML = html;
    });
});
</script>