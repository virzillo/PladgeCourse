<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $guarded = [];

    public function logcards()
    {
        return $this->hasMany(Logcard::class);
    }
}
