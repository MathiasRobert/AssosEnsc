<?php

namespace App\Http\Controllers;

use App\Article;
use App\Association;
use App\Evenement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
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
            //if(Carbon::parse($entries->dateDeb))
            //$entries->put('estPasse', );
        }
        return view('pages.asso.index', compact('articles', 'evenements', 'association'));
    }


    public function genereCss(Request $request, $id)
    {
        $asso = Association::find($id);
        $couleur = $asso->couleur;
        $logo = $asso->logo;
        $css = '
.avatar > img, .avatar-nav > img {
  content: url("'.$logo.'")
}
            
.btn,
.btn:hover,
.btn:active,
.btn:visited,
.btn:focus {
  background-color: '.$couleur.' !important;
}
.form-group.is-focused label, .form-group.is-focused label.control-label {
  color: '.$couleur.' !important;
}
.form-control, .form-group .form-control {
 background-image: linear-gradient('.$couleur.', '.$couleur.'), linear-gradient(#D2D2D2, #D2D2D2) !important;
}
.form-group:is-focused .form-control {
    background-image: linear-gradient('.$couleur.', '.$couleur.'), linear-gradient(#D2D2D2, #D2D2D2) !important;
}

.card > .header, .card > form > .header{
  background-color: '.$couleur.' !important;
}

.navbar {
  background-color: '.$couleur.' !important;
}

.dropdown-menu li > a:hover, a:focus{
 background-color: '.$couleur.' !important;
}

a, a:hover, a:focus {
  color: '.$couleur.';
}

a:not(.btn), a:active:not(.btn), a:hover:not(.btn), a:focus:not(.btn) {
  background-color: transparent !important;
}

input[type=checkbox]:checked  + .checkbox-material .check {
  background: '.$couleur.' !important;
}

.nav-pills.nav-pills-color > li.active > a, .nav-pills.nav-pills-color > li.active > a:focus, .nav-pills.nav-pills-color > li.active > a:hover {
    background-color: '.$couleur.' !important;
    box-shadow: 0 16px 26px -10px rgba(10, 10, 10, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(10, 10, 10, 0.2);
}
.panel .panel-heading a {
    color: #3C4858;
}
.panel .panel-heading a:hover, .panel .panel-heading a:focus {
    color: '.$couleur.' !important;
    text-decoration: none;
}
        ';
        $response = Response::make($css);
        $response->header('Content-Type', 'text/css');
        return $response;
    }
}
