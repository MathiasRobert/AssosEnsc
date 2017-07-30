<?php

namespace App\Http\Controllers;

use App\Article;
use App\CategorieArticle;
use Illuminate\Http\Request;
use Auth;
use App\Association;
use Validator;
use Illuminate\Support\Facades\Input;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $association = Association::where('email', Auth::user()->email)->first();
        $articles = $association->articles->all();
        return view('admin.articles.index', compact('articles', 'association'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $association = Association::where('email', Auth::user()->email)->first();
        $categories = CategorieArticle::all();
        return view('admin.articles.create', compact('association', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'titre'       => 'required',
            'texte'      => 'required',
            'image' => 'required',
            'categorie' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('admin/articles/create')
                ->withErrors($validator);
        } else {
            // store
            $association = Association::where('email', Auth::user()->email)->first();

            $article = new Article();
            $article->titre     = $request->get('titre');
            $article->texte     = $request->get('texte');
            $article->image     = $request->get('image');
            $article->categorie_id     = $request->get('categorie');
            $article->association_id = $association->id;
            $article->save();

            // redirect
            //Session::flash('message', 'Successfully created nerd!');
            return redirect('admin/articles');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $association = Association::where('email', Auth::user()->email)->first();
        $categories = CategorieArticle::all();
        $article = Article::find($id);
        return view('admin.articles.edit', compact('article', 'association', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'titre'       => 'required',
            'texte'      => 'required',
            'categorie' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('admin/articles/edit/'.$id)
                ->withErrors($validator);
        } else {
            // store
            $association = Association::where('email', Auth::user()->email)->first();

            $article = Article::find($id);
            $article->titre     = $request->get('titre');
            $article->texte     = $request->get('texte');
            if($request->get('image') != null)
                $article->image     = $request->get('image');
            $article->categorie_id     = $request->get('categorie');
            $article->save();

            // redirect
            //Session::flash('message', 'Successfully created nerd!');
            return redirect('admin/articles');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        // delete
        $article = Article::find($id);
        $article->delete();

        if ( $request->ajax() ) {
            $article->delete( $request->all() );

            return response(['msg' => 'Product deleted', 'status' => 'success']);
        }
        return response(['msg' => 'Failed deleting the product', 'status' => 'failed']);
    }
}
