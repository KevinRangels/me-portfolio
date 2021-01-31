<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'id', 'technology_id', 'name', 'description', 'contribution', 'link', 'repository', 'images', 'date', 'image_order', 'image_poster'
    ];

    public function technologies() {
        return $this->belongsToMany('App\Technology');
    }
}
