<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Article;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        //dd($articles);
        return view('article.index',compact('articles'));
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            
           // 'user_id' =>'required',
            'title'=>'required',
            'content'=> 'required',
            'photo'=> 'required ',
            //|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            //'auteur' => 'required'
            
        ]);


        $article = new article([
            'user_id' => Auth::id(),
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'photo' => $request->get('photo'),
           // 'auteur' => $request->get('auteur')
        ]);

       // $path = $request->file('photo')->store('public/images');
        $article->save();
        return redirect('/')->with('success', 'article Ajouté avec succès');

      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('article.show', compact('article'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);

        return view('article.edit', compact('article'));

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
        $request->validate([

            'title'=>'required',
            'content'=> 'required', 
            'photo'=> 'required',
            //|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

        ]);

        $article = article::findOrFail($id);
        $article->title = $request->get('title');
        $article->content = $request->get('content');
        $article->photo = $request->get('photo');

        $article->update();

        return redirect('/')->with('success', 'article Modifié avec succès');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect('/')->with('success', 'article Supprimé avec succès');

    }

  /*    public function apropos()
 {
        return view('apropos');

     } */
}
