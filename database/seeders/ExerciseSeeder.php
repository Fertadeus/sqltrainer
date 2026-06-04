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
        $exercises = [
            [
                'id' => 1,
                'title' => 'Introducción',
                'description' => 'SQL es un lenguaje diseñado para comunicarse con bases de datos. Dependiendo de las sentencias que utilicemos, podremos añadir, borrar o mostrar datos de la base de datos. Nosotros nos centraremos en las consultas SELECT, que sirven para mostrar los datos de tablas ya existentes.<br><br>Las tablas son las unidades en las que se divide una base de datos. Para sacar información de una base de datos, lo idóneo es conocer de antemano su estructura: qué tablas tiene y cómo se relacionan entre sí. Durante este curso podrás hacerlo con el botón de <span class="font-monospace">Mostrar tablas</span>.<br><br>Para conocer los datos que contiene una tabla escribiremos lo siguiente: <span class="font-monospace">SELECT * FROM nombredetabla;</span><br><br>En el lenguaje SQL el asterisco significa "todo". Más concretamente, el asterisco significa "todas las columnas". Al introducir este comando, la base de datos nos devolverá todas las filas y todas la columnas de la tabla que elijamos. Para completar el ejercicio, intenta mostrar toda la información de la tabla <span class="font-monospace">games</span>.',
                'expected_sql' => 'SELECT * FROM games;',
                'expected_result' => json_encode([
                    ['id' => 1,'title' => 'Elden Ring','genre' => 'RPG','release_year' => 2022,'rating' => 9.7],
                    ['id' => 2,'title' => 'Hollow Knight','genre' => 'Metroidvania','release_year' => 2017,'rating' => 9.5],
                    ['id' => 3,'title' => 'The Witcher 3','genre' => 'RPG','release_year' => 2015,'rating' => 9.8],
                    ['id' => 4,'title' => 'Red Dead Redemption 2','genre' => 'Action-Adventure','release_year' => 2018,'rating' => 9.7],
                    ['id' => 5,'title' => 'God of War','genre' => 'Action','release_year' => 2018,'rating' => 9.6],
                    ['id' => 6,'title' => 'Cyberpunk 2077','genre' => 'RPG','release_year' => 2020,'rating' => 7.5],
                    ['id' => 7,'title' => 'Sekiro','genre' => 'Action','release_year' => 2019,'rating' => 9.4],
                    ['id' => 8,'title' => 'Hades','genre' => 'Roguelike','release_year' => 2020,'rating' => 9.3],
                    ['id' => 9,'title' => 'Celeste','genre' => 'Platformer','release_year' => 2018,'rating' => 9.2],
                    ['id' => 10,'title' => 'Stardew Valley','genre' => 'Simulation','release_year' => 2016,'rating' => 9.5],
                    ['id' => 11,'title' => 'Minecraft','genre' => 'Sandbox','release_year' => 2011,'rating' => 9.8],
                    ['id' => 12,'title' => 'Terraria','genre' => 'Sandbox','release_year' => 2011,'rating' => 9.4],
                    ['id' => 13,'title' => 'DOOM Eternal','genre' => 'Shooter','release_year' => 2020,'rating' => 9.1],
                    ['id' => 14,'title' => 'Portal 2','genre' => 'Puzzle','release_year' => 2011,'rating' => 9.9],
                    ['id' => 15,'title' => 'Half-Life 2','genre' => 'Shooter','release_year' => 2004,'rating' => 9.8],
                    ['id' => 16,'title' => 'Among Us','genre' => 'Party','release_year' => 2018,'rating' => 8.5],
                    ['id' => 17,'title' => 'Fortnite','genre' => 'Battle Royale','release_year' => 2017,'rating' => 8.0],
                    ['id' => 18,'title' => 'League of Legends','genre' => 'MOBA','release_year' => 2009,'rating' => 8.7],
                    ['id' => 19,'title' => 'Valorant','genre' => 'Shooter','release_year' => 2020,'rating' => 8.6],
                    ['id' => 20,'title' => 'The Last of Us','genre' => 'Action-Adventure','release_year' => 2013,'rating' => 9.8],
                    ['id' => 21,'title' => 'Bloodborne','genre' => 'RPG','release_year' => 2015,'rating' => 9.6],
                    ['id' => 22,'title' => 'Ghost of Tsushima','genre' => 'Action','release_year' => 2020,'rating' => 9.3],
                    ['id' => 23,'title' => 'Resident Evil 2','genre' => 'Horror','release_year' => 2019,'rating' => 9.2],
                ]),
                'course' => 'Introducción',
                'subtitle' => 'Primer paso en el mundo de las consultas SELECT',

            ],
            [
                'id' => 2,
                'title' => 'Selección por columna',
                'description' => 'SQL también nos permite seleccionar columnas específicas. En entornos de trabajo podemos encontrarnos con tablas que contengan numerosas columnas, y no siempre van a ser relevantes para nuestra consulta. SQL nos permite seleccionar únicamente las columnas que nos interesa mostrar, filtrando el resto. Para seleccionar las columnas específicas que necesitemos de una tabla escribiremos lo siguiente: <span class="font-monospace">SELECT nombre_de_columna1, nombre_de_columna2, ... FROM nombre_de_tabla;</span> Nótese que cuando seleccionamos más de una columna, hay que separar sus nombres entre sí con comas.<br><br>Para completar el ejercicio, intenta mostrar las columnas <span class="font-monospace">title</span> y <span class="font-monospace">genre</span> de la tabla <span class="font-monospace">games</span>',
                'expected_sql' => 'SELECT title, genre FROM games;',
                'expected_result' => json_encode([
                    ['title' => 'Elden Ring','genre' => 'RPG'],
                    ['title' => 'Hollow Knight','genre' => 'Metroidvania'],
                    ['title' => 'The Witcher 3','genre' => 'RPG'],
                    ['title' => 'Red Dead Redemption 2','genre' => 'Action-Adventure'],
                    ['title' => 'God of War','genre' => 'Action'],
                    ['title' => 'Cyberpunk 2077','genre' => 'RPG'],
                    ['title' => 'Sekiro','genre' => 'Action'],
                    ['title' => 'Hades','genre' => 'Roguelike'],
                    ['title' => 'Celeste','genre' => 'Platformer'],
                    ['title' => 'Stardew Valley','genre' => 'Simulation'],
                    ['title' => 'Minecraft','genre' => 'Sandbox'],
                    ['title' => 'Terraria','genre' => 'Sandbox'],
                    ['title' => 'DOOM Eternal','genre' => 'Shooter'],
                    ['title' => 'Portal 2','genre' => 'Puzzle'],
                    ['title' => 'Half-Life 2','genre' => 'Shooter'],
                    ['title' => 'Among Us','genre' => 'Party'],
                    ['title' => 'Fortnite','genre' => 'Battle Royale'],
                    ['title' => 'League of Legends','genre' => 'MOBA'],
                    ['title' => 'Valorant','genre' => 'Shooter'],
                    ['title' => 'The Last of Us','genre' => 'Action-Adventure'],
                    ['title' => 'Bloodborne','genre' => 'RPG'],
                    ['title' => 'Ghost of Tsushima','genre' => 'Action'],
                    ['title' => 'Resident Evil 2','genre' => 'Horror'],
                ]),
                'course' => 'Introducción',
                'subtitle' => 'Seleccionar columnas específicas',

            ],
            [
                'id' => 3,
                'title' => 'Cláusula WHERE',
                'description' => 'La cláusula WHERE en SQL es utilizada para filtrar los datos en una consulta. Si en el ejercicio anterior filtrábamos las columnas que no nos interesaban, la cláusula WHERE nos permite filtrar filas, es decir, los resultados encontrados directamente por nuestra consulta. Se utiliza para especificar condiciones que deben cumplirse para que una fila sea incluida en el resultado de la consulta. Por ejemplo, si queremos seleccionar las filas que tengan como título "Elden Ring", utilizaremos la siguiente sentencia: <span class="font-monospace">SELECT * FROM games WHERE title="Elden Ring";</span> ¡Recuerda que siempre puedes copiar y pegar la sentencia en el recuadro de abajo para comprobar los resultados!<br><br>Como ves, la sentencia sigue el siguiente esquema : <span class="font-monospace">SELECT nombre_de_columnas FROM nombre_de_tabla WHERE condición;</span> En este caso, "condición" hace referencia a un montón de posibilidades: puedes comparar números con <span class="font-monospace">=</span> , <span class="font-monospace">&lt;</span> o <span class="font-monospace">&gt;</span> , comparar strings... Iremos viendo dichas posibilidades una a una en los siguientes ejercicios.<br><br> De momento, trata de mostrar todos los datos de la tabla <span class="font-monospace">games</span> siempre y cuando el género sea <span class="font-monospace">RPG</span>. Cuando comparas cadenas de caracteres, la condición debe ir envuelta en comillas, como en el ejemplo anterior.',
                'expected_sql' => 'SELECT * FROM games WHERE genre = "RPG";',
                'expected_result' => json_encode([
                    ['id' => 1,'title' => 'Elden Ring','genre' => 'RPG','release_year' => 2022,'rating' => 9.7],
                    ['id' => 3,'title' => 'The Witcher 3','genre' => 'RPG','release_year' => 2015,'rating' => 9.8],
                    ['id' => 6,'title' => 'Cyberpunk 2077','genre' => 'RPG','release_year' => 2020,'rating' => 7.5],
                    ['id' => 21,'title' => 'Bloodborne','genre' => 'RPG','release_year' => 2015,'rating' => 9.6],
                ]),
                'course' => 'Introducción',
                'subtitle' => 'Introducción a la cláusula WHERE',
            ],
            [
                'id' => 4,
                'title' => 'Cláusula WHERE 2',
                'description' => 'Al utilizar la cláusula WHERE, podemos agregar más de una condición. Para ello usaremos <span class="font-monospace">AND</span>.<br><br> Por ejemplo, si queremos que la base de datos nos devuelva los datos de los juegos cuyo género sea <span class="font-monospace">Shooter</span> y cuya fecha de salida sea previa al 2010, utilizaremos <span class="font-monospace">SELECT * FROM games WHERE genre="Shooter" AND release_year &lt; 2010</span>.<br><br> Por otro lado, también existe la sentencia <span class="font-monospace">OR</span>. Se utiliza exactamente igual que la sentencia <span class="font-monospace">AND</span>. La sentencia <span class="font-monospace">AND</span> obliga al cumplimiento de las dos condiciones si queremos que de un resultado, en el ejemplo anterior, tiene sí o sí que ser un "Shooter" y sí o sí haber salido antes del año 2010. Al utilizar <span class="font-monospace">OR</span>, la consulta nos devolverá las filas que cumplan al menos uno de los dos resultados: si el juego es un "Shooter", perfecto, y si ha salido antes de 2010, también perfecto. Vale cualquiera de las dos.<br><br>En este ejercicio, intenta averiguar el <span class="font-monospace">title</span>, <span class="font-monospace">release_year</span> y <span class="font-monospace">rating</span> de los juegos que salieron antes del 2020 cuya nota sea superior a 9,5. Recuerda que, en informática, es común que los números decimales se escriban con puntos, en vez de con comas.',
                'expected_sql' => 'SELECT title, release_year, rating FROM games WHERE release_year < 2020 AND rating > 9.5;',
                'expected_result' => json_encode([
                    ['title' => 'The Witcher 3','release_year' => 2015,'rating' => 9.8],
                    ['title' => 'Red Dead Redemption 2','release_year' => 2018,'rating' => 9.7],
                    ['title' => 'God of War','release_year' => 2018,'rating' => 9.6],
                    ['title' => 'Minecraft','release_year' => 2011,'rating' => 9.8],
                    ['title' => 'Portal 2','release_year' => 2011,'rating' => 9.9],
                    ['title' => 'Half-Life 2','release_year' => 2004,'rating' => 9.8],
                    ['title' => 'The Last of Us','release_year' => 2013,'rating' => 9.8],
                    ['title' => 'Bloodborne','release_year' => 2015,'rating' => 9.6],
                ]),
                'course' => 'Introducción',
                'subtitle' => 'Uso de AND',
            ],
            [
                'id' => 5,
                'title' => 'Limit',
                'description' => 'A veces, no nos interesará llenar nuestros resultados de datos y querremos limitar nuestra búsqueda a un número fijo de filas. En esto, cada base de datos es un mundo. Otras bases de datos utilizan <span class="font-monospace">FETCH FIRST 2 ROWS ONLY;</span>, como las basadas en Oracle, o <span class="font-monospace">SELECT TOP 2</span>, usadas por MS Access y similares. Estas sintaxis dejan claro el funcionamiento del comando: mostrará las primeras filas que devuelva la búsqueda.<br><br>Nosotros estamos utilizando una base de datos MySQL. Para limitar el número de resultados en una base de datos como la nuestra, utilizaremos la siguiente sintaxis: <span class="font-monospace">SELECT * FROM tabla LIMIT 2</span>. El "2" nos indica que limitamos nuestra búsqueda a dos resultados, pero podemos elegir cualquier número. ¡Simplemente recuerda que este comando varía entre distintas bases de datos!<br><br>Para resolver este ejercicio, vamos a utilizar una tabla que no habíamos usado hasta ahora: <span class="font-monospace">developers</span>. Recuerda que puedes ver las tablas y sus columnas con el botón de la derecha, <span class="font-monospace">Mostrar tablas</span>. Para resolver el ejercicio, escribe una consulta que devuelva las primeras cinco filas completas de la tabla <span class="font-monospace">developers</span>.',
                'expected_sql' => 'SELECT * FROM developers LIMIT 5;',
                'expected_result' => json_encode([
                    ['id' => 1,'name' => 'FromSoftware','country' => 'Japan'],
                    ['id' => 2,'name' => 'Team Cherry','country' => 'Australia'],
                    ['id' => 3,'name' => 'CD Projekt Red','country' => 'Poland'],
                    ['id' => 4,'name' => 'Rockstar Games','country' => 'USA'],
                    ['id' => 5,'name' => 'Santa Monica Studio','country' => 'USA'],
                ]),
                'course' => 'Introducción',
                'subtitle' => 'Limitar resultados',
            ],
            [
                'id' => 6,
                'title' => 'Like',
                'description' => 'La sentencia <span class="font-monospace">LIKE</span> se usa junto a <span class="font-monospace">WHERE</span> para buscar patrones en una base de datos. Sirve, por ejemplo, para buscar todos los desarrolladores que empiezan por la letra "E", o todos los juegos que contienen "the" en alguna parte de su título. <br><br>Para utilizar la sentencia <span class="font-monospace">LIKE</span>, tendremos que hacer uso de dos símbolos: <span class="font-monospace">%</span>(porcentaje) y <span class="font-monospace">_</span> (barra baja). El porcentaje representa cualquier número de caracteres, incluido cero. Si utilizamos el ejemplo anterior, y queremos averiguar todos los <span class="font-monospace">developers</span> que empiezan por la letra "E", ejecutaremos la siguiente consulta: <span class="font-monospace">SELECT * FROM developers WHERE name LIKE "e%";</span>. Esta consulta busca un nombre que empiece por la letra "E", seguido de cualquier número de caracteres. ¡Encontraría hasta un estudio cuyo nombre fuese simplemente "E"!<br><br>Además, se puede utilizar cualquier combinación de estos símbolos. ¿Quieres encontrar todos los juegos cuya segunda letra sea la "A"? Puedes probar con la siguiente consulta: <span class="font-monospace">SELECT * FROM games WHERE title LIKE "_a%";</span>. Como hemos dicho anteriormente, la barra baja indica un único caracter, así que esta consulta asume que la letra "A" será el segundo caracter, seguido de cualquier número de caracteres.<br><br>Ahora es tu turno. Utiliza todo lo que has aprendido en el curso de introducción, y averigua el título y género de los juegos que tengan "the" en algún lugar de su título, y además, que su fecha de salida sea posterior a 2014. ¡Recuerda que, para comparar cadenas de caracteres, tienes que utilizar las comillas!',
                'expected_sql' => 'SELECT title, genre FROM games WHERE title LIKE "%the%" AND release_year>2014;',
                'expected_result' => json_encode([
                    ['title' => 'The Witcher 3','genre' => 'RPG'],
                ]),
                'course' => 'Introducción',
                'subtitle' => 'Uso de LIKE',
            ],
            [
                'id' => 7,
                'title' => 'Ejercicio real 1',
                'description' => '¡Vamos a practicar todo lo que hemos aprendido hasta ahora para afianzarlo un poco! En este primer ejercicio, trata de averiguar el título y año de salida de los juegos que sean una segunda o tercera entrega en la saga. ¡Recuerda que puedes hacer todas las consultas <span class="font-monospace">SELECT</span> que quieras! Puedes buscar un patrón buscando en la base de datos, y cuando sepas cómo se suelen escribir ese tipo de juegos, intentar realizar una consulta que los englobe a todos.',
                'expected_sql' => 'SELECT title, release_year FROM games WHERE title LIKE "%2" OR title LIKE "%3";',
                'expected_result' => json_encode([
                    ['title' => 'The Witcher 3','release_year' => 2015],
                    ['title' => 'Red Dead Redemption 2','release_year' => 2018],
                    ['title' => 'Portal 2','release_year' => 2011],
                    ['title' => 'Half-Life 2','release_year' => 2004],
                    ['title' => 'Resident Evil 2','release_year' => 2019],
                ]),
                'course' => 'Primeros ejercicios de práctica',
                'subtitle' => 'Primer ejercicio',
            ],
            [
                'id' => 8,
                'title' => 'Ejercicio real 2',
                'description' => 'Para el segundo ejercicio, realiza una consulta que muestre el nombre de las desarrolladoras cuyo país sea USA y tengan la palabra "games" en alguna parte de su nombre.',
                'expected_sql' => 'SELECT name FROM developers WHERE country = "USA" AND name LIKE "%games%";',
                'expected_result' => json_encode([
                    ['name' => 'Rockstar Games'],
                    ['name' => 'Supergiant Games'],
                    ['name' => 'Epic Games'],
                    ['name' => 'Riot Games'],
                ]),
                'course' => 'Primeros ejercicios de práctica',
                'subtitle' => 'Segundo ejercicio',
            ],
            [
                'id' => 9,
                'title' => 'Order By',
                'description' => 'A veces, queremos que nuestras consultas vengan ordenadas. La cláusula <span class="font-monospace">ORDER BY</span> ordena la consulta al darle el nombre de una columna. Por ejemplo, ¿nos interesa ver la tabla de juegos, pero ordenada por su fecha de salida? Escribiremos <span class="font-monospace">SELECT * FROM games ORDER BY release_year;</span>.<br><br>Además, <span class="font-monospace">ORDER BY</span> nos permite especificar si queremos que los resultados se muestren ordenados de forma ascendente o descendente. Para ello, añadiremos <span class="font-monospace">ASC</span> si queremos que sea ascendente, y <span class="font-monospace">DESC</span> si queremos que sea descendente. Por defecto se muestran los resultados de manera ascendente, así que si queremos ver los juegos ordenados por la fecha de salida, de más reciente a más antiguo, escribiremos la siguiente consulta: <span class="font-monospace">SELECT * FROM games ORDER BY release_year DESC;</span><br><br>La combinación de <span class="font-monospace">ORDER BY</span> con <span class="font-monospace">LIMIT</span> es muy potente, ya que permite seleccionar un número específico de filas, que previamente hemos ordenado como hemos querido. Para resolver este ejercicio, asumiendo que no hay "empates", realiza una consulta que muestre el juego más antiguo de la base de datos.',
                'expected_sql' => 'SELECT * FROM games ORDER BY release_year LIMIT 1;',
                'expected_result' => json_encode([
                     ['id' => 15,'title' => 'Half-Life 2','genre' => 'Shooter','release_year' => 2004,'rating' => 9.8],
                ]),
                'course' => 'Funciones de grupo',
                'subtitle' => 'Ordenar consultas',
            ],
            [
                'id' => 10,
                'title' => 'Group By',
                'description' => 'La sentencia <span class="font-monospace">GROUP BY</span> nos sirve para agrupar filas que tienen el mismo valor. Por ejemplo, podríamos agrupar a todos los desarrolladores que tienen el mismo país de origen, o los juegos con el mismo género. Sin embargo, a esas filas "resumidas" les falta información: no podemos seleccionar también el nombre de todas esas desarrolladoras, porque están agrupadas en una sola fila. Tal y como lo he contado, GROUP BY sólo serviría para una cosa: sacar los datos de una columna sin repetirse. Por ejemplo, usando esta consulta: <span class="font-monospace">SELECT country FROM developers GROUP BY country;</span>. Si la pruebas, verás que salen todos los países que tienen una desarrolladora registrada en nuestra base de datos, sin repetición.<br><br>Como esto es poco útil, normalmente usamos junto con <span class="font-monospace">GROUP BY</span> las denominadas "funciones de grupo". Estas funciones sirven para, al agrupar las filas en una sola "fila resumen", hacer algún tipo de cálculo con los datos que se perderían en el proceso. Aunque en los ejercios siguiente usaremos todas las funciones de grupo, en este ejercicio nos centraremos en el uso de <span class="font-monospace">AVG</span>, que significa "Average", lo que se traduce como "Media". Si yo quisiera sacar la media de las notas que tiene un videojuego por género, escribiría lo siguiente: <span class="font-monospace">SELECT genre, AVG(rating) FROM games GROUP BY genre;</span>. Como ves, escribiremos la columna a la que queramos hacerle el cálculo dentro de la función de grupo. Además, ten en cuenta que la columna que elegimos para hacer <span class="font-monospace">GROUP BY</span> debe aparecer obligatoriamente en el <span class="font-monospace">SELECT</span>.<br><br>Para pasar al siguiente ejercicio, intenta realizar una consulta que halle el año medio de salida de los juegos agrupados por su género.',
                'expected_sql' => 'SELECT genre, AVG(release_year) FROM games GROUP BY genre;',
                'expected_result' => json_encode([
                     ['genre' => 'RPG','AVG(release_year)' => 2018.0000],
                     ['genre' => 'Metroidvania','AVG(release_year)' => 2017.0000],
                     ['genre' => 'Action-Adventure','AVG(release_year)' => 2015.5000],
                     ['genre' => 'Action','AVG(release_year)' => 2019.0000],
                     ['genre' => 'Roguelike','AVG(release_year)' => 2020.0000],
                     ['genre' => 'Platformer','AVG(release_year)' => 2018.0000],
                     ['genre' => 'Simulation','AVG(release_year)' => 2016.0000],
                     ['genre' => 'Sandbox','AVG(release_year)' => 2011.0000],
                     ['genre' => 'Shooter','AVG(release_year)' => 2014.6667],
                     ['genre' => 'Puzzle','AVG(release_year)' => 2011.0000],
                     ['genre' => 'Party','AVG(release_year)' => 2018.0000],
                     ['genre' => 'Battle Royale','AVG(release_year)' => 2017.0000],
                     ['genre' => 'MOBA','AVG(release_year)' => 2009.0000],
                     ['genre' => 'Horror','AVG(release_year)' => 2019.0000],
                ]),
                'course' => 'Funciones de grupo',
                'subtitle' => 'Uso de funciones de grupo: GROUP BY',
            ],
        ];

        DB::table('exercises')->upsert(
            $exercises,
            ['id'],                  // clave única: detecta si el ejercicio ya existe
            [                        // campos que se actualizan si ya existe
                'title',
                'description',
                'expected_sql',
                'expected_result',
                'course',
                'subtitle'
            ]
        );
    }
}