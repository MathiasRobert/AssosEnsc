<?php

namespace App\Http\Controllers;

use App\Article;
use App\Association;
use App\Evenement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use Auth;

class AssociationController extends Controller
{

    public function index(Request $request, $diminutif)
    {
        $association = Association::where('diminutif', $diminutif)->first();
        $articles = Article::where('association_id', $association->id)->join('categorie_articles', 'articles.categorie_id', '=', 'categorie_articles.id')->get();
        foreach($articles as $entries){
            $entries->texte = substr($entries->texte, 0, 250);
        }
        $evenements = Evenement::where('association_id', $association->id)->get();
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

    public function getCurrentAssociation(Request $request){
        return Association::where('email', Auth::user()->email)->first();
    }


}
