<?php

namespace App\Http\Controllers;

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
        $articles = $association->articles();
        return view('admin.article', compact('articles', 'association'));

    }
}
