<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('game_developer')->truncate();
        DB::table('game_platform')->truncate();
        DB::table('developers')->truncate();
        DB::table('platforms')->truncate();
        DB::table('games')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        // GAMES -> Los primeros están escritos así para que se vea clara su estructura, a partir de ahí, claridad de código
        DB::table('games')->insert([
            [
                'title' => 'Elden Ring',
                'genre' => 'RPG',
                'release_year' => 2022,
                'rating' => 9.7
            ],
            [
                'title' => 'Hollow Knight',
                'genre' => 'Metroidvania',
                'release_year' => 2017,
                'rating' => 9.5
            ],
            [
                'title' => 'The Witcher 3',
                'genre' => 'RPG',
                'release_year' => 2015,
                'rating' => 9.8
            ],
            ['title'=>'Red Dead Redemption 2','genre'=>'Action-Adventure','release_year'=>2018,'rating'=>9.7],
            ['title'=>'God of War','genre'=>'Action','release_year'=>2018,'rating'=>9.6],
            ['title'=>'Cyberpunk 2077','genre'=>'RPG','release_year'=>2020,'rating'=>7.5],
            ['title'=>'Sekiro','genre'=>'Action','release_year'=>2019,'rating'=>9.4],
            ['title'=>'Hades','genre'=>'Roguelike','release_year'=>2020,'rating'=>9.3],
            ['title'=>'Celeste','genre'=>'Platformer','release_year'=>2018,'rating'=>9.2],
            ['title'=>'Stardew Valley','genre'=>'Simulation','release_year'=>2016,'rating'=>9.5],
            ['title'=>'Minecraft','genre'=>'Sandbox','release_year'=>2011,'rating'=>9.8],
            ['title'=>'Terraria','genre'=>'Sandbox','release_year'=>2011,'rating'=>9.4],
            ['title'=>'DOOM Eternal','genre'=>'Shooter','release_year'=>2020,'rating'=>9.1],
            ['title'=>'Portal 2','genre'=>'Puzzle','release_year'=>2011,'rating'=>9.9],
            ['title'=>'Half-Life 2','genre'=>'Shooter','release_year'=>2004,'rating'=>9.8],
            ['title'=>'Among Us','genre'=>'Party','release_year'=>2018,'rating'=>8.5],
            ['title'=>'Fortnite','genre'=>'Battle Royale','release_year'=>2017,'rating'=>8.0],
            ['title'=>'League of Legends','genre'=>'MOBA','release_year'=>2009,'rating'=>8.7],
            ['title'=>'Valorant','genre'=>'Shooter','release_year'=>2020,'rating'=>8.6],
            ['title'=>'The Last of Us','genre'=>'Action-Adventure','release_year'=>2013,'rating'=>9.8],
            ['title'=>'Bloodborne','genre'=>'RPG','release_year'=>2015,'rating'=>9.6],
            ['title'=>'Ghost of Tsushima','genre'=>'Action','release_year'=>2020,'rating'=>9.3],
            ['title'=>'Resident Evil 2','genre'=>'Horror','release_year'=>2019,'rating'=>9.2]
        ]);

        // PLATFORMS
        DB::table('platforms')->insert([
            ['name' => 'PC'],
            ['name' => 'PlayStation'],
            ['name' => 'Xbox'],
            ['name' => 'Nintendo Switch'],
        ]);

        // GAME_PLATFORM (pivot)
        DB::table('game_platform')->insert([
            ['game_id' => 1, 'platform_id' => 1],
            ['game_id' => 1, 'platform_id' => 2],

            ['game_id' => 2, 'platform_id' => 1],
            ['game_id' => 2, 'platform_id' => 4],

            ['game_id' => 3, 'platform_id' => 1],
            ['game_id' => 3, 'platform_id' => 2],
            ['game_id' => 3, 'platform_id' => 3],

            ['game_id'=>4,'platform_id'=>1],
            ['game_id'=>4,'platform_id'=>2],
            ['game_id'=>4,'platform_id'=>3],

            ['game_id'=>5,'platform_id'=>2],

            ['game_id'=>6,'platform_id'=>1],
            ['game_id'=>6,'platform_id'=>2],

            ['game_id'=>7,'platform_id'=>1],
            ['game_id'=>7,'platform_id'=>2],

            ['game_id'=>8,'platform_id'=>1],
            ['game_id'=>8,'platform_id'=>4],

            ['game_id'=>9,'platform_id'=>1],
            ['game_id'=>9,'platform_id'=>4],

            ['game_id'=>10,'platform_id'=>1],
            ['game_id'=>10,'platform_id'=>4],

            ['game_id'=>11,'platform_id'=>1],
            ['game_id'=>11,'platform_id'=>2],
            ['game_id'=>11,'platform_id'=>3],

            ['game_id'=>12,'platform_id'=>1],

            ['game_id'=>13,'platform_id'=>1],
            ['game_id'=>13,'platform_id'=>3],

            ['game_id'=>14,'platform_id'=>1],

            ['game_id'=>15,'platform_id'=>1],

            ['game_id'=>16,'platform_id'=>1],
            ['game_id'=>16,'platform_id'=>4],

            ['game_id'=>17,'platform_id'=>1],
            ['game_id'=>17,'platform_id'=>2],
            ['game_id'=>17,'platform_id'=>3],

            ['game_id'=>18,'platform_id'=>1],

            ['game_id'=>19,'platform_id'=>1],

            ['game_id'=>20,'platform_id'=>2],

            ['game_id'=>21,'platform_id'=>2],

            ['game_id'=>22,'platform_id'=>2],

            ['game_id'=>23,'platform_id'=>1],
            ['game_id'=>23,'platform_id'=>2]
        ]);

        // DEVELOPERS
        DB::table('developers')->insert([
            ['name' => 'FromSoftware', 'country' => 'Japan'],
            ['name' => 'Team Cherry', 'country' => 'Australia'],
            ['name' => 'CD Projekt Red', 'country' => 'Poland'],
            ['name'=>'Rockstar Games','country'=>'USA'],
            ['name'=>'Santa Monica Studio','country'=>'USA'],
            ['name'=>'CD Projekt Red','country'=>'Poland'],
            ['name'=>'Supergiant Games','country'=>'USA'],
            ['name'=>'Matt Makes Games','country'=>'Canada'],
            ['name'=>'ConcernedApe','country'=>'USA'],
            ['name'=>'Mojang','country'=>'Sweden'],
            ['name'=>'Re-Logic','country'=>'USA'],
            ['name'=>'id Software','country'=>'USA'],
            ['name'=>'Valve','country'=>'USA'],
            ['name'=>'Innersloth','country'=>'USA'],
            ['name'=>'Epic Games','country'=>'USA'],
            ['name'=>'Riot Games','country'=>'USA'],
            ['name'=>'Naughty Dog','country'=>'USA'],
            ['name'=>'Sucker Punch','country'=>'USA'],
            ['name'=>'Capcom','country'=>'Japan']
        ]);

        // GAME_DEVELOPER (pivot)
        DB::table('game_developer')->insert([
            ['game_id' => 1, 'developer_id' => 1],
            ['game_id' => 2, 'developer_id' => 2],
            ['game_id' => 3, 'developer_id' => 3],
            ['game_id'=>4,'developer_id'=>4],
            ['game_id'=>5,'developer_id'=>5],
            ['game_id'=>6,'developer_id'=>6],
            ['game_id'=>7,'developer_id'=>1],
            ['game_id'=>8,'developer_id'=>7],
            ['game_id'=>9,'developer_id'=>8],
            ['game_id'=>10,'developer_id'=>9],
            ['game_id'=>11,'developer_id'=>10],
            ['game_id'=>12,'developer_id'=>11],
            ['game_id'=>13,'developer_id'=>12],
            ['game_id'=>14,'developer_id'=>13],
            ['game_id'=>15,'developer_id'=>13],
            ['game_id'=>16,'developer_id'=>14],
            ['game_id'=>17,'developer_id'=>15],
            ['game_id'=>18,'developer_id'=>16],
            ['game_id'=>19,'developer_id'=>16],
            ['game_id'=>20,'developer_id'=>17],
            ['game_id'=>21,'developer_id'=>1],
            ['game_id'=>22,'developer_id'=>18],
            ['game_id'=>23,'developer_id'=>19]
        ]);
    }
}
