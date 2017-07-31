<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Association extends Model
{
    /**
     * Scope a query to only include diminutif.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDiminutif($query)
    {
        return $query->select('diminutif')->pluck('diminutif');
    }


    public function evenements(){
        return $this->hasMany('App\Evenement');
    }

    public function articles(){
        return $this->hasMany('App\Article');
    }

    public function membres(){
        return $this->hasMany('App\Membre');
    }

    public function couleur() {
        return $this->belongsTo('App\Couleur');
    }

}
