<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';

    protected $fillable = [
    	'title', 'description'
    ];

    public function students() {
    	return $this->hasMany('App\Student');
    }
}
