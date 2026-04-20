<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {

         DB::table('exercises')->truncate();

        DB::table('exercises')->insert([

            [
                'id' => 1,
                'title' => 'Introducción',
                'description' => 'SQL es un lenguaje diseñado para comunicarse con bases de datos. Dependiendo de las sentencias que utilicemos, podremos añadir, borrar o mostrar datos de la base de datos. Nosotros nos centraremos en las consultas SELECT, que sirven para mostrar los datos de tablas ya existentes.<br><br>Las tablas son las unidades en las que se divide una base de datos. Para sacar información de una base de datos lo idóneo es conocer de antemano su estructura: qué tablas tiene y cómo se relacionan entre sí. Durante este curso podrás hacerlo con el botón de Mostrar tablas.<br><br>Para conocer los datos que contiene una tabla escribiremos lo siguiente: <span class="font-monospace">SELECT * FROM nombredetabla;</span><br><br>El asterisco significa todo, por lo que sacaremos la información completa de la tabla. Para completar el ejercicio, intenta mostrar toda la información de la tabla <span class="font-monospace">games</span>',
                'expected_sql' => 'SELECT * FROM games;',
                'expected_result' => json_encode([
                    [
                        'id' => 1,
                        'title' => 'Elden Ring',
                        'genre' => 'RPG',
                        'release_year' => 2022,
                        'rating' => 9.7
                    ],
                    [
                        'id' => 2,
                        'title' => 'Hollow Knight',
                        'genre' => 'Metroidvania',
                        'release_year' => 2017,
                        'rating' => 9.5
                    ],
                    [
                        'id' => 3,
                        'title' => 'The Witcher 3',
                        'genre' => 'RPG',
                        'release_year' => 2015,
                        'rating' => 9.8
                    ]
                ]),
                'course' => 'Introducción',
                'subtitle' => 'Primer paso en el mundo de las consultas SELECT'
            ],

            [
                'id' => 2,
                'title' => 'Selección por columna',
                'description' => 'SQL también permite seleccionar columnas específicas. En entornos de trabajo podemos encontrarnos con tablas que contengan numerosas columnas. Seleccionando únicamente las columnas que nos interesa mostrar, podremos filtrar el resto. Para seleccionar las columnas específicas que necesitemos de una tabla escribiremos lo siguiente: <span class="font-monospace">SELECT nombre_de_columna1, nombre_de_columna2, ... FROM nombre_de_tabla;</span><br><br>Para completar el ejercicio, intenta mostrar las columnas <span class="font-monospace">title</span> y <span class="font-monospace">genre</span> de la tabla <span class="font-monospace">games</span>',
                'expected_sql' => 'SELECT title, genre FROM games;',
                'expected_result' => json_encode([
                    [
                        'title' => 'Elden Ring',
                        'genre' => 'RPG'
                    ],
                    [
                        'title' => 'Hollow Knight',
                        'genre' => 'Metroidvania'
                    ],
                    [
                        'title' => 'The Witcher 3',
                        'genre' => 'RPG'
                    ]
                ]),
                'course' => 'Introducción',
                'subtitle' => 'Seleccionar columnas específicas'
            ],

            [
                'id' => 3,
                'title' => 'Cláusula WHERE',
                'description' => 'La cláusula WHERE en SQL es utilizada para filtrar los datos en una consulta. Se utiliza para especificar condiciones que deben cumplirse para que una fila sea incluida en el resultado de la consulta. Por ejemplo, si queremos seleccionar las filas que tengan como título "Elden Ring", utilizaremos la siguiente sentencia: <span class="font-monospace">SELECT * FROM games WHERE title="Elden Ring";</span> ¡Recuerda que siempre puedes copiar y pegar la sentencia en el recuadro de abajo para comprobar los resultados!<br><br>Como ves, la sentencia sigue el siguiente esquema : <span class="font-monospace">SELECT nombre_de_columnas FROM nombre_de_tabla WHERE condición;</span> En este caso, "condición" hace referencia a un montón de posibilidades: puedes comparar números con <span class="font-monospace">=</span> , <span class="font-monospace">&lt;</span> o <span class="font-monospace">&gt;</span> , comparar strings... Iremos viendo dichas posibilidades una a una en los siguientes ejercicios.<br><br> De momento, trata de mostrar todos los datos de la tabla <span class="font-monospace">games</span> siempre y cuando el género sea <span class="font-monospace">RPG</span>',
                'expected_sql' => 'SELECT * FROM games WHERE genre = "RPG";',
                'expected_result' => json_encode([
                    [
                        'id' => 1,
                        'title' => 'Elden Ring',
                        'genre' => 'RPG',
                        'release_year' => 2022,
                        'rating' => 9.7
                    ],
                    [
                        'id' => 3,
                        'title' => 'The Witcher 3',
                        'genre' => 'RPG',
                        'release_year' => 2015,
                        'rating' => 9.8
                    ]
                ]),
                'course' => 'Introducción',
                'subtitle' => 'Introducción a la cláusula WHERE'
            ],
        ]);
    }
}
