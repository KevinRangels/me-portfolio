<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'id', 'technology_id', 'name', 'description', 'contribution', 'link', 'images', 'date'
    ];

    public function technologies() {
        return $this->belongsToMany('App\Technology');
    }
}
