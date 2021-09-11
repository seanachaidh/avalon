<?php
namespace App\View\Components;

use Illuminate\View\Component;

class ArticleEditor extends Component {
    public $article;
    public $newmode;

    function __construct($article = null) {
        $this->article = $article;
        $this->newmode = $article == null;
    }

    public function render() {
        return view('components.articleeditor');
    }

}