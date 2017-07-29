<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    /**
     * Get the association that owns the evenement.
     */
    public function association()
    {
        return $this->belongsTo('App\Association');
    }

    /**
     * Get the categorie associated with the article.
     */
    public function categorie()
    {
        return $this->belongsTo('App\CategorieEvenement');
    }
}
