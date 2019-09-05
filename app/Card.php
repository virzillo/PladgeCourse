<?php

namespace App;

use App\Course;
use App\Logcard;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $guarded = [];

    public function logcards()
    {
        return $this->hasMany(Logcard::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
