<?php
namespace App\View\Components;

use Illuminate\View\Component;

class ArticleEditor extends Component {
    public $article;

    function __construct($article) {
        $this->article = $article;
    }

    public funcion render() {
        return view('components.articleeditor');
    }

}