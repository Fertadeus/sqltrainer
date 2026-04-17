<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExerciseController extends Controller
{
    public function index()
    {
        
        $exercises = Exercise::orderBy('course')
        ->orderBy('id')
        ->get()
        ->groupBy('course');

        return view('exercise.index', compact('exercises'));
    }

    public function show($id)
    {
        
        $exercise = Exercise::findOrFail($id);
        //Pasa true o false dependiendo de si tiene o no un ejercicio por encima. 
        //Esto sirve para la alerta de Ejercicio completado correctamente

        $nextExercise = \App\Models\Exercise::where('id', '>', $id)->exists();


        return view('exercise.show', compact('exercise', 'nextExercise'));
    }


    public function runQuery(Request $request, $id)
    {

        /*De aquí para abajo, por orden:
            
            - Guardo el ejercicio actual (esto es para después sacar el expected_result)
            - Compruebo qué query he recibido (storage->logs->laravel.log)
            - Recojo la query, compruebo si viene anidada, y si lo viene, cojo su resultado
            - La transformo en string
            - Compruebo el estado de la query después de las transformaciones

        */
        

        $exercise = Exercise::findOrFail($id);

        \Log::info('QUERY RECIBIDA:', ['query' => $request->input('query')]);
        $query = $request->input('query');

        if (is_array($query) && isset($query['query'])) {
            $query = $query['query'];
        }

        $query = trim((string) $query);
        \Log::info('QUERY FINAL:', ['query' => $query]);


        // Validación (sólo permite hacer selects) -> y después hace el select. Comprueba que no da error.

        if ($query === '' || !preg_match('/^select\s/i', $query)) {
            return response()->json([
                'error' => 'Solo se permiten consultas SELECT.'
            ], 400);
        }

        try {
            //Clave en la seguridad, se conecta mediante el archivo "config/database.php", busca esa conexión.
            //Esa conexión únicamente tiene permiso para SELECTS en ciertas tablas
            //Básicamente, se implementa aislamiento mediante control de permisos a nivel de SGBD

            $userResult = DB::connection('sql_training')->select($query);
        } catch (\Throwable $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 400);
        }

        //Respuesta final de usuario y respuesta propia. Comprobamos que son iguales. La respuesta que devolvemos
        //es si es correcto o no, y el resultado de la query (en json)

        $userArray = json_decode(json_encode($userResult), true);
        $expectedArray = json_decode($exercise->expected_result, true);
        $correct = ($userArray == $expectedArray);

        return response()->json([
            'correct' => $correct,
            'result' => $userArray
        ]);
    }



}