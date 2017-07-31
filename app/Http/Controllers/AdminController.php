<?php

namespace App\Http\Controllers;

use App\Couleur;
use Auth;
use App\Association;

class AdminController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dashboard()
    {
        $association = Association::where('email', Auth::user()->email)->first();
        return view('admin.dashboard', compact('association'));
    }

    public function articles()
    {
        $association = Association::where('email', Auth::user()->email)->first();
        $articles = $association->articles->all();
        return view('admin.article', compact('articles', 'association'));
    }

    public function evenements()
    {
        $association = Association::where('email', Auth::user()->email)->first();
        $evenements = $association->evenements->all();
        return view('admin.evenement', compact('evenements', 'association'));

    }

    public function association()
    {
        $association = Association::where('email', Auth::user()->email)->first();
        $couleurs = Couleur::all();
        return view('admin.association', compact( 'association', 'couleurs'));

    }
}
