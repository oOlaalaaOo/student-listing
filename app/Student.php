<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    protected $fillable = [
    	'firstname', 'midname', 'lastname', 'year_level', 'course_id'
    ];

    public function course() {
    	return $this->belongsTo('App\Course');	
    }
}
