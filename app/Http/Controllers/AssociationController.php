<?php

namespace App\Http\Controllers;

use App\Article;
use App\Association;
use App\Evenement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use Auth;

use Validator;
use Illuminate\Support\Facades\Input;


class AssociationController extends Controller
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


    public function getCurrentAssociation(Request $request){
        return Association::where('email', Auth::user()->email)->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            'couleur_id'       => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect('admin/association')
                ->withErrors($validator);
        } else {
            $association = Association::find($id);
            if($request->get('logo') != null)
                $association->logo     = $request->get('logo');
            $association->couleur_id = $request->get('couleur_id');
            $association->lien_facebook = $request->get('lien_facebook');
            $association->lien_siteweb = $request->get('lien_siteweb');
            $association->description_courte = $request->get('description_courte');
            $association->description_longue = $request->get('description_longue');
            $association->save();

            return redirect('admin/association');
        }
    }

}
