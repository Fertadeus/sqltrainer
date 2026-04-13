<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
   public $timestamps = false;

    protected $fillable = [
        'title',
        'genre',
        'release_year',
        'rating'
    ];

    public function platforms()
    {
        return $this->belongsToMany(Platform::class, 'game_platform');
    }

    public function developers()
    {
        return $this->belongsToMany(Developer::class, 'game_developer');
    }
}
