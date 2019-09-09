<?php

namespace App;

use App\User;
use App\Token;
use Illuminate\Database\Eloquent\Model;

class Tokenlog extends Model
{
    protected $guarded = [];

    public function token()
    {
        return $this->belongsTo(Token::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'operatore');
    }
}
