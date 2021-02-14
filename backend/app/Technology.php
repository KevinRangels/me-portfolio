<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    protected $fillable = [
        'id', 'language_id', 'name', 'description', 'branch', 'skills', 'image'
    ];

    public static function search($query='') {
        if(!$query) {
            return self::with('language')->get();
        }
        return self::with('language')
                   ->where('name', 'like', "%$query%")
                   ->orWhere('branch', 'like', "%$query%")
                   ->get();
    }

    public function projects() {
        return $this->belongsToMany('App\Project');
    }
    public function language() {
        return $this->belongsTo('App\Language', 'language_id');
    }
}
