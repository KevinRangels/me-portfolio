<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    protected $fillable = [
        'id', 'language_id', 'name', 'description', 'branch', 'skills', 'image'
    ];

    public function projects() {
        return $this->belongsToMany('App\Project');
    }
}
