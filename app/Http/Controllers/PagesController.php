<?php

namespace App\Http\Controllers;

use App\Evenement;
use App\Article;
use Illuminate\Http\Request;
use App\Association;
use Carbon\Carbon;
use Jenssegers\Date\Date;

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
            Date::setLocale('fr');
            $entries->dateNumJour = Date::parse($entries->dateDeb)->format('j');
            $entries->dateMois = Date::parse($entries->dateDeb)->format('F');
            $entries->dateJour = Date::parse($entries->dateDeb)->format('l');
            $entries->dateAnnee = Date::parse($entries->dateDeb)->format('Y');
            $entries->heureDeb = Date::parse($entries->dateDeb)->format('H:i');
            $dateEvenement = Carbon::parse($entries->dateDeb);
            $dateActuelle = Carbon::now();
            if($dateEvenement->gte($dateActuelle))
                $entries->estPasse = false;
            else
                $entries->estPasse = true;
        }
        $evenements = collect($evenements)->sortByDesc(function ($obj, $key) {
            return $obj->dateDeb;
        });

        $membres = $association->membres;
        return view('pages.asso.index', compact('membres', 'articles', 'evenements', 'association'));
    }

    public function home()
    {
        $associations = Association::all();
        $evenements = Evenement::all();
        $articles = Article::all();
        return view('pages.home', compact( 'associations', 'evenements', 'articles'));
    }

    public function calendrier()
    {
        return view('pages.calendrier');
    }
}
