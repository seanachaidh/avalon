<?php

namespace App\Http\Controllers\Web;

use App\Models\Article;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{

    private function resolve(Article $article){
        return Storage::disk('public')->get($article->contents);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $article = Article::orderBy('created_at', 'desc')->get();

        //Van de variabele een referentie maken zodat ik het direct kan bewerken
        foreach ($article as &$a) {
            $new_contents = $this->resolve($a);
            $a->html_contents = $new_contents;
        }

        if ($request->wantsJson()){
            return response()->json($article);
        } else {
            return view('overview', ['articles' => $article]);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('addblog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request->input('title');
        $contents = $request->input('contents');
        $synopsis = $request->input('synopsis');

        $new_filename = "articles/article_" . $title . ".html";

        $newart = Article::create([
            'title' => $title,
            'contents' => $new_filename,
            'synopsis' => $synopsis
        ]);
        
        /*
         * Save the requested filename
         */
        Storage::disk('public')->put($new_filename, $contents);

        if ($request->wantsJson()) {
            return response()->json([
                'created' => 'true',
                'object' => $newart
            ]);
        } else {
            return redirect()->intended('/articles');
        }
    }

    /*
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article, Request $request)
    {
        if($request->wantsJson()) {
            return response()->json($article);
        } else {
            return redirect()->intended('/articles');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
    }
}
