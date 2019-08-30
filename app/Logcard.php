<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logcard extends Model
{
    protected $guarded = [];

    public function card()
    {
        return $this->belongsTo(Card::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'operatore');
    }
}
