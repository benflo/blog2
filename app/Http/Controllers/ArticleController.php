<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use App\Articles;
use Illuminate\Http\Request;
use DB;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $articles =DB::table('articles')->orderBy('created_at','desc')->paginate(10);

        return view('welcome')->with('articles',$articles);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.article.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $titre = $request->titre;
        $contenu = $request->contenu;

        $articles = new Articles([
            'titre' => $titre,
            'contenu' => $contenu,
            'user_id' => auth()->id(),
        ]);
        $articles->save();
        return redirect()->route('welcome');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function editView(Request $request){
        $id = $request->id;
        $articles = Articles::find($id);

        return view('admin.article.edit', compact('articles'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

        $id = $request->id;
        $articles = Articles::find($id);
        $articles->titre = $request->input('titre');
        $articles->contenu = $request->input('contenu');

        $articles->save();
        return redirect()->route('welcome');

    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $article=Articles::find($id);

        $article->delete();

        return redirect()->route('welcome');

    }
}
