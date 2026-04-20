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
        // GAMES
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
        ]);

        // DEVELOPERS
        DB::table('developers')->insert([
            ['name' => 'FromSoftware', 'country' => 'Japan'],
            ['name' => 'Team Cherry', 'country' => 'Australia'],
            ['name' => 'CD Projekt Red', 'country' => 'Poland'],
        ]);

        // GAME_DEVELOPER (pivot)
        DB::table('game_developer')->insert([
            ['game_id' => 1, 'developer_id' => 1],
            ['game_id' => 2, 'developer_id' => 2],
            ['game_id' => 3, 'developer_id' => 3],
        ]);
    }
}
