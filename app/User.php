<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'avatar', 'google_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token'
    ];

    public function isAdmin(){
        return (Auth::check() && Association::where('email', '=', Auth::user()->email)->first());
    }

    public function estInscrit($evenement_id){
        return Inscription::where([
            ['user_id', '=', Auth::user()->id],
            ['evenement_id', '=', $evenement_id]
        ])->first();
    }
}
