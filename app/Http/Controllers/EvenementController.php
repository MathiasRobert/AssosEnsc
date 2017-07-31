<?php

namespace App\Http\Controllers;

use App\CategorieEvenement;
use App\Evenement;
use App\Http\Requests\StoreEvenementRequest;
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEvenementRequest $request)
    {
        $association = Association::where('email', Auth::user()->email)->first();
        $evenement = new Evenement($request->all());
        $evenement->association_id = $association->id;
        $evenement->affiche = '/images/image_placeholder.jpg';
        $evenement->save();
        if (isset($request->affiche) && $request->file('affiche')->isValid()) {
            $evenement->affiche = $request->affiche->store('public/images/'.$evenement->association_id.'/evenements/'.$evenement->id);
            $evenement->affiche = '/storage/'.substr($evenement->affiche, 7);
        }
        $evenement->save();

        return redirect('admin/evenements');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
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
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEvenementRequest $request, $id)
    {
        $evenement = Evenement::find($id);
        $evenement->fill($request->all());
        if (isset($request->affiche) && $request->file('affiche')->isValid()) {
            $evenement->affiche = $request->affiche->store('public/images/'.$evenement->association_id.'/evenements/'.$evenement->id);
            $evenement->affiche = '/storage/'.substr($evenement->affiche, 7);
        }
        $evenement->save();

        return redirect('admin/evenements');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Evenement::destroy($id);

        if ($request->ajax()) {
            Evenement::destroy($request->all());

            return response(['status' => 'success']);
        }
        return response(['status' => 'failed']);
    }
}
