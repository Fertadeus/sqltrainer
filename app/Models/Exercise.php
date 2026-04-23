<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'course',
        'description',
        'expected_sql',
        'expected_result'
    ];


    public function users(){
        
        return $this->belongsToMany(\App\Models\User::class)->withTimestamps();
    }
}
