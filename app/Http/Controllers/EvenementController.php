<?php

namespace App\Http\Controllers;

use App\CategorieEvenement;
use App\Evenement;
use Illuminate\Http\Request;
use App\Association;
use Auth;
use Validator;
use Illuminate\Support\Facades\Input;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $association = Association::where('email', Auth::user()->email)->first();
        $evenements = $association->evenements->all();
        return view('admin.evenements.index', compact('evenements', 'association'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $association = Association::where('email', Auth::user()->email)->first();
        $categories = CategorieEvenement::all();
        return view('admin.evenements.create', compact('association', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'titre'       => 'required',
            'lieu'      => 'required',
            'affiche' => 'required',
            'prix' => 'required',
            'categorie_id' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect('admin/evenements/create')
                ->withErrors($validator);
        } else {
            $association = Association::where('email', Auth::user()->email)->first();

            $evenements = new Evenement();
            $evenements->titre     = $request->get('titre');
            $evenements->lieu     = $request->get('lieu');
            $evenements->affiche     = $request->get('affiche');
            $evenements->categorie_id     = $request->get('categorie_id');
            $evenements->dateDeb     = $request->get('dateDeb');
            $evenements->dateFin     = $request->get('dateFin');
            $evenements->prix     = $request->get('prix');
            $evenements->tarifs     = $request->get('tarifs');
            $evenements->description     = $request->get('description');
            $evenements->nbMaxParticipants     = $request->get('nbMaxParticipants');
            $evenements->association_id = $association->id;
            $evenements->save();

            return redirect('admin/evenements');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $association = Association::where('email', Auth::user()->email)->first();
        $categories = CategorieEvenement::all();
        $evenement = Evenement::find($id);
        return view('admin.evenements.edit', compact('evenement', 'association', 'categories'));
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
            'titre'       => 'required',
            'lieu'      => 'required',
            'prix'      => 'required',
            'categorie_id' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect('admin/evenements/edit'.$id)
                ->withErrors($validator);
        } else {
            $association = Association::where('email', Auth::user()->email)->first();

            $evenement = Evenement::find($id);
            $evenement->titre = $request->get('titre');
            $evenement->lieu = $request->get('lieu');
            if($request->get('affiche') != null)
                $evenement->image     = $request->get('affiche');
            $evenement->categorie_id = $request->get('categorie_id');
            $evenement->dateDeb = $request->get('dateDeb');
            $evenement->dateFin = $request->get('dateFin');
            $evenement->prix = $request->get('prix');
            $evenement->tarifs = $request->get('tarifs');
            $evenement->description = $request->get('description');
            $evenement->nbMaxParticipants = $request->get('nbMaxParticipants');
            $evenement->association_id = $association->id;
            $evenement->save();

            return redirect('admin/evenements');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $evenement = Evenement::find($id);
        $evenement->delete();

        if ( $request->ajax() ) {
            $evenement->delete( $request->all() );

            return response(['status' => 'success']);
        }
        return response(['status' => 'failed']);
    }
}
