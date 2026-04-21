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
                    ],
                    ['id'=>4,'title'=>'Red Dead Redemption 2','genre'=>'Action-Adventure','release_year'=>2018,'rating'=>9.7],
                    ['id'=>5,'title'=>'God of War','genre'=>'Action','release_year'=>2018,'rating'=>9.6],
                    ['id'=>6,'title'=>'Cyberpunk 2077','genre'=>'RPG','release_year'=>2020,'rating'=>7.5],
                    ['id'=>7,'title'=>'Sekiro','genre'=>'Action','release_year'=>2019,'rating'=>9.4],
                    ['id'=>8,'title'=>'Hades','genre'=>'Roguelike','release_year'=>2020,'rating'=>9.3],
                    ['id'=>9,'title'=>'Celeste','genre'=>'Platformer','release_year'=>2018,'rating'=>9.2],
                    ['id'=>10,'title'=>'Stardew Valley','genre'=>'Simulation','release_year'=>2016,'rating'=>9.5],
                    ['id'=>11,'title'=>'Minecraft','genre'=>'Sandbox','release_year'=>2011,'rating'=>9.8],
                    ['id'=>12,'title'=>'Terraria','genre'=>'Sandbox','release_year'=>2011,'rating'=>9.4],
                    ['id'=>13,'title'=>'DOOM Eternal','genre'=>'Shooter','release_year'=>2020,'rating'=>9.1],
                    ['id'=>14,'title'=>'Portal 2','genre'=>'Puzzle','release_year'=>2011,'rating'=>9.9],
                    ['id'=>15,'title'=>'Half-Life 2','genre'=>'Shooter','release_year'=>2004,'rating'=>9.8],
                    ['id'=>16,'title'=>'Among Us','genre'=>'Party','release_year'=>2018,'rating'=>8.5],
                    ['id'=>17,'title'=>'Fortnite','genre'=>'Battle Royale','release_year'=>2017,'rating'=>8.0],
                    ['id'=>18,'title'=>'League of Legends','genre'=>'MOBA','release_year'=>2009,'rating'=>8.7],
                    ['id'=>19,'title'=>'Valorant','genre'=>'Shooter','release_year'=>2020,'rating'=>8.6],
                    ['id'=>20,'title'=>'The Last of Us','genre'=>'Action-Adventure','release_year'=>2013,'rating'=>9.8],
                    ['id'=>21,'title'=>'Bloodborne','genre'=>'RPG','release_year'=>2015,'rating'=>9.6],
                    ['id'=>22,'title'=>'Ghost of Tsushima','genre'=>'Action','release_year'=>2020,'rating'=>9.3],
                    ['id'=>23,'title'=>'Resident Evil 2','genre'=>'Horror','release_year'=>2019,'rating'=>9.2]

                ]),
                'course' => 'Introducción',
                'subtitle' => 'Primer paso en el mundo de las consultas SELECT'
            ],

            [
                'id' => 2,
                'title' => 'Selección por columna',
                'description' => 'SQL también permite seleccionar columnas específicas. En entornos de trabajo podemos encontrarnos con tablas que contengan numerosas columnas. Seleccionando únicamente las columnas que nos interesa mostrar, podremos filtrar el resto. Para seleccionar las columnas específicas que necesitemos de una tabla escribiremos lo siguiente: <span class="font-monospace">SELECT nombre_de_columna1, nombre_de_columna2, ... FROM nombre_de_tabla;</span> Nótese que cuando seleccionamos más de una columna, hay que separar sus nombres entre sí con comas.<br><br>Para completar el ejercicio, intenta mostrar las columnas <span class="font-monospace">title</span> y <span class="font-monospace">genre</span> de la tabla <span class="font-monospace">games</span>',
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
                    ],
                    ['title'=>'Red Dead Redemption 2','genre'=>'Action-Adventure'],
                    ['title'=>'God of War','genre'=>'Action'],
                    ['title'=>'Cyberpunk 2077','genre'=>'RPG'],
                    ['title'=>'Sekiro','genre'=>'Action'],
                    ['title'=>'Hades','genre'=>'Roguelike'],
                    ['title'=>'Celeste','genre'=>'Platformer'],
                    ['title'=>'Stardew Valley','genre'=>'Simulation'],
                    ['title'=>'Minecraft','genre'=>'Sandbox'],
                    ['title'=>'Terraria','genre'=>'Sandbox'],
                    ['title'=>'DOOM Eternal','genre'=>'Shooter'],
                    ['title'=>'Portal 2','genre'=>'Puzzle'],
                    ['title'=>'Half-Life 2','genre'=>'Shooter'],
                    ['title'=>'Among Us','genre'=>'Party'],
                    ['title'=>'Fortnite','genre'=>'Battle Royale'],
                    ['title'=>'League of Legends','genre'=>'MOBA'],
                    ['title'=>'Valorant','genre'=>'Shooter'],
                    ['title'=>'The Last of Us','genre'=>'Action-Adventure'],
                    ['title'=>'Bloodborne','genre'=>'RPG'],
                    ['title'=>'Ghost of Tsushima','genre'=>'Action'],
                    ['title'=>'Resident Evil 2','genre'=>'Horror']
                ]),
                'course' => 'Introducción',
                'subtitle' => 'Seleccionar columnas específicas'
            ],

            [
                'id' => 3,
                'title' => 'Cláusula WHERE',
                'description' => 'La cláusula WHERE en SQL es utilizada para filtrar los datos en una consulta. Se utiliza para especificar condiciones que deben cumplirse para que una fila sea incluida en el resultado de la consulta. Por ejemplo, si queremos seleccionar las filas que tengan como título "Elden Ring", utilizaremos la siguiente sentencia: <span class="font-monospace">SELECT * FROM games WHERE title="Elden Ring";</span> ¡Recuerda que siempre puedes copiar y pegar la sentencia en el recuadro de abajo para comprobar los resultados!<br><br>Como ves, la sentencia sigue el siguiente esquema : <span class="font-monospace">SELECT nombre_de_columnas FROM nombre_de_tabla WHERE condición;</span> En este caso, "condición" hace referencia a un montón de posibilidades: puedes comparar números con <span class="font-monospace">=</span> , <span class="font-monospace">&lt;</span> o <span class="font-monospace">&gt;</span> , comparar strings... Iremos viendo dichas posibilidades una a una en los siguientes ejercicios.<br><br> De momento, trata de mostrar todos los datos de la tabla <span class="font-monospace">games</span> siempre y cuando el género sea <span class="font-monospace">RPG</span>. Cuando comparas cadenas de caracteres, la condición debe ir envuelta en comillas, como en el ejemplo anterior.',
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
                    ],
                    ['id'=>6,'title'=>'Cyberpunk 2077','genre'=>'RPG','release_year'=>2020,'rating'=>7.5],
                    ['id'=>21,'title'=>'Bloodborne','genre'=>'RPG','release_year'=>2015,'rating'=>9.6]

                ]),
                'course' => 'Introducción',
                'subtitle' => 'Introducción a la cláusula WHERE'
            ],
        [
                'id' => 4,
                'title' => 'Cláusula WHERE 2',
                'description' => 'Al utilizar la cláusula WHERE, podemos agregar más de una condición. Para ello usaremos <span class="font-monospace">AND</span>.<br><br> Por ejemplo, si queremos que la base de datos nos devuelva los datos de los juegos cuyo género sea <span class="font-monospace">Shooter</span> y cuya fecha de salida sea previa al 2010, utilizaremos <span class="font-monospace">SELECT * FROM games WHERE genre="Shooter" AND release_year &lt; 2010</span><br><br>En este ejercicio, intenta averiguar el <span class="font-monospace">title</span>, <span class="font-monospace">release_year</span> y <span class="font-monospace">rating</span> de los juegos que salieron antes del 2020 cuya nota sea superior a 9,5.',
                'expected_sql' => 'SELECT title, release_year, rating FROM games WHERE release_year < 2020 AND rating > 9.5;',
                'expected_result' => json_encode([
                    [
                        'title' => 'The Witcher 3',
                        'release_year' => 2015,
                        'rating' => 9.8
                    ],
                    ['title'=>'Red Dead Redemption 2','release_year'=>2018,'rating'=>9.7],
                    ['title'=>'God of War','release_year'=>2018,'rating'=>9.6],
                    ['title'=>'Minecraft','release_year'=>2011,'rating'=>9.8],
                    ['title'=>'Portal 2','release_year'=>2011,'rating'=>9.9],
                    ['title'=>'Half-Life 2','release_year'=>2004,'rating'=>9.8],
                    ['title'=>'The Last of Us','release_year'=>2013,'rating'=>9.8],
                    ['title'=>'Bloodborne','release_year'=>2015,'rating'=>9.6]

                ]),
                'course' => 'Introducción',
                'subtitle' => 'Uso de AND'
            ]
        ]);
    }
}
