<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'technology_id', 'name', 'description', 'contribution', 'link', 'images', 'date'
    ];
}
