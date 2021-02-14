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

    public function scopeFoo($query, $technology_id)
{
    if(!$technology_id) {
        return self::with('technologies');
    }
    return $query->whereHas('technologies', function ($query) use ($technology_id) {
        $query->where('project_technology.technology_id', $technology_id);
    })->with('technologies');

}

}
