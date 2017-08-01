<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Association;
use Carbon\Carbon;

class PagesController extends Controller
{
    public function index(Request $request, $diminutif)
    {
        $association = Association::where('diminutif', $diminutif)->first();
        $association->couleur = $association->couleur->code;
        $articles = $association->articles;
        foreach($articles as $entries){
            $entries->categorie = $entries->categorie->nom;
            $entries->texte = substr($entries->texte, 0, 250);
        }
        $evenements = $association->evenements;
        foreach($evenements as $entries){
            $dateEvenement = Carbon::parse($entries->dateDeb.' '.$entries->heureDeb);
            $dateActuelle = Carbon::now();
            if($dateEvenement->gte($dateActuelle))
                $entries->estPasse = false;
            else
                $entries->estPasse = true;
        }
        return view('pages.asso.index', compact('articles', 'evenements', 'association'));
    }
}
