<?php
namespace App\Models\ModelViews;

use App\Models\Article;

class OverviewView {
    public Article $currentArticle;
    public $articles;
    public $index; //The index of the currently selected article
    
    
    public function __construct(Array $articles, Article $currentArticle) {
        $this->currentArticle = $currentArticle;
        $this->articles = $articles;
        
        $this->loadIndex();
    }
    
    private function loadIndex() {
        $currentId = $this->currentArticle['id'];
        $this->index = -1;
        
        //Gets the index of the currently selected article and sets in the model
        foreach ($this->articles as $key=>$a) {
            if($a['id'] == $currentId) {
                $this->index = $key;
                break;
            }
        }
    }
    
}