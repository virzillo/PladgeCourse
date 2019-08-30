<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = [];

    public function getActiveAttribute($attribute)
    {
        return [
            1 => 'Attivo',
            0 => 'Inattivo',
        ][$attribute];
    }
    public function getTypeAttribute($attribute)
    {
        return [
            0 => 'Potenziale',
            1 => 'Cliente',
        ][$attribute];
    }
    public function scopeActive($query)
    {

        return $query->where('active', 1);
    }
    public function scopeInactive($query)
    {

        return $query->where('active', 0);
    }

    //raggruppa tutti gli utenti potenziali
    //$customers = Customer::potenziali()->orderBy('created_at')->get();
    public function scopePotenziali($query)
    {
        return $query->where('type', 1);
    }
    //raggruppo dinamico

    //eseguire la query con
    //$users = App\User::ofType('0')->get();
    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }


    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
