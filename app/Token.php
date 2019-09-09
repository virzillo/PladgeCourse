<?php

namespace App;

use App\Course;
use App\Tokenlog;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $guarded = [];

    public function logs()
    {
        return $this->hasMany(Tokenlog::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
