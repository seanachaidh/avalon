<div class="article-item">
    <div class=article-item-title>
        {{$article->title}}
    </div>
    <div class=article-item-menu>
        <span class=article-item-menu-icon>...</span>
        <ul class=article-item-menu-items>
            <li>
                <form action="/articles/{{$article->id}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input type="submit" class="btn btn-danger" value="Verwijderen"/>
                </form>
                
            </li>
        </ul>
    </div>
</div>
