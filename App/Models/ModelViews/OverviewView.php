<?php
namespace App\Models\ModelViews;

use App\Models\Article;

class OverviewView {
    public $currentArticle;
    public $articles;
    public $index; //The index of the currently selected article
    
    
    public function __construct($articles, $currentArticle) {
        $this->currentArticle = $currentArticle;
        $this->articles = $articles;
        if($currentArticle != null) {
            $this->loadIndex();
        } else {
            $index = -1;
        }
        
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