<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\ModelViews\OverviewView;

class OverviewController extends Controller
{
    private $viewName = 'panels.adminoverview';
    
    public function showOverview(Request $request)
    {
        $articles = Article::orderBy('created_at', 'desc')->get();
        $view = new OverviewView($articles, null);
        return view($this->viewName, ['view' => $view]);
    }

    public function handleClick(Article $article, Request $request)
    {
        $articles = Article::orderBy('created_at', 'desc')->get();
        $view = new OverviewView($articles, $article);
        
        return view($this->viewName, $view);
    }
}
