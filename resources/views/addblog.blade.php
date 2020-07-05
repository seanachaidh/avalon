@extends('main')

@section('content')

<form method="POST" action="/articles">
    @csrf
    <div class="form-group">
        <label for="title">Titel</label>
        <input type="text" name="title" id="title" class="form-control" />
    </div>
    <div class="form-group">
        <label for="synopsis">Beschrijving</label>
        <input type="text" name="synopsis" id="synopsis" class=form-control" />
    </div>
    <div class="form-group">
        <label for="contents">Inhoud</label>
        <textarea class="form-control" name="contents" id="contents"></textarea>
    </div>
    <button type="submit" class="btn btn-default">Maken!</button>
</form>

@endsection