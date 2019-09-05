<?php

namespace App;

use App\Card;
use App\Module;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = [];

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    public function card()
    {
        return $this->belongsTo(Card::class);
    }
}
