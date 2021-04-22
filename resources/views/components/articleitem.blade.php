<div class="article-item">
    <form class="form-inline" method="post">
        <div class="form-group">
            <label for="articleItemDropdown">
                {{$article->title}}
            </label>
            <div class="dropdown">
                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="articleItemDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Article menu
                </button>
                <div class="dropdown-menu" aria-labelledby="articleItemDropdown">
                    <a class="dropdown-item" href="#">Verwijderen</a>
                    <a class="dropdown-item" href="#">Bewerken</a>
                    <a class="dropdown-item" href="#">Nog geen idee</a>
                </div>
            </div>
        </div>
    </form>
</div>
