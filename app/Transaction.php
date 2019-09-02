<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = [];

    public function getRicorrenteAttribute($attribute)
    {
        return [
            1 => '<span class="label label-danger">Ricorrente</span>',
            0 => '<span class="label label-warning">Singolo</span>',
        ][$attribute];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'operatore');
    }
}
