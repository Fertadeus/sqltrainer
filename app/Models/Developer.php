<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'country'];

    public function games()
    {
        return $this->belongsToMany(Game::class, 'game_developer');
    }
}
