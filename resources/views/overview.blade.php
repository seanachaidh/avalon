@extends('main')

@section ('content')
    <h1 class="main-header"> Pieters weblog </h1>
    @foreach ($articles as $article)
        <div class="artview">
            <h3> {{ $article->title }} </h3>
            <div class="arttext">
                {{ $article->contents }}
            </div>
            <button type="button" class="btn" data-toggle="modal" data-target="#mymodal"> commentaar </button>
            <div id="mymodal" class="modal fade" role="modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"> Commentaar </h4>
                        </div>
                        <div class="modal-body">
                            testing the dialog
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