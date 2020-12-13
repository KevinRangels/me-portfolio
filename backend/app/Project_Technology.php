<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_Technology extends Model
{
    protected $table = 'project_technology';
    protected $fillable = [
        'project_id', 'technology_id'
    ];
}
