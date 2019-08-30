<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'nome', 'descrizione', 'costo',
    ];

    public function modules()
    {
        return $this->hasMany(Module::class);
    }
}
