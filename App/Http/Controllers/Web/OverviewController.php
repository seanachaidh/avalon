<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class OverviewController extends Controller
{
    public function showOverview(Request $request)
    {
        
    }

    public function handleClick(Request $request)
    {
        //show here a specific article
        $buttonval = $request->input("articleButton", "");
        if($buttonval == "") {
            return $this->showOverview($request);
        } else {
            //Get hidden Id value
            $artid = $request->input("artid", "");
            $article = Article::find($artid);
            
        }
    }

}
