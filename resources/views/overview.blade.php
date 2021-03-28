@extends('main')

@section ('content')
    <h1 class="main-header"> Pieters weblog </h1>
    @foreach ($articles as $article)
        <div class="artview">
            <h3> {{ $article->title }} </h3>
            <div class="arttext">
                {{$article->html_contents}}
            </div>
            <button type="button" class="btn" data-toggle="modal" data-target="#mymodal-{{$article->id}}"> commentaar </button>
            <div id="mymodal-{{$article->id}}" class="modal fade" role="modal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"> Commentaar </h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-inline" action="/articles/{{$article->id}}/comments" method="POST">
                                @csrf
                                <input type="text" name="contents" class="commentinput" />
                                <div class="inputbuttons">
                                    <button name="action" value="send_comment" class="btn btn-primary btn-sm">Send comment</button>
                                </div>
                            </form>
                            @foreach($article->comments()->get() as $comment)
                                <div class=comment-author">
                                    {{$comment->author}}
                                </div>
                                <div class="comment-text">
                                    {{$comment->contents}}
                                </div>
                            @endforeach
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Sluiten</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr />
    @endforeach

@endsection