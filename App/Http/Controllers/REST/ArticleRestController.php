<?php
namespace App\Http\Controllers\Rest;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ArticleRestConroller extends Controller {
    private function resolve(Article $article){
        return Storage::disk('public')->get($article->contents);
    }

    public function index(Request $request) {
        $article = Article::orderBy('created_at', 'desc')->get();

        //Van de variabele een referentie maken zodat ik het direct kan bewerken
        foreach ($article as &$a) {
            $new_contents = $this->resolve($a);
            $a->html_contents = $new_contents;
        }

        return response()->json($article);
    }

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

        return response()->json([
            'created' => 'true',
            'object' => $newart
        ]);
    }

    public function show(Article $article, Request $request)
    {
        return response()->json($article);
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
        //TODO: method incomplete
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
        $retval = [
            "voltooid" => true
        ];

        return response()->json($retval);
    }

}