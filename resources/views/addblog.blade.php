@extends('main')

@section('content')

<form method="POST" action="/addblog">
    <div class="form-group">
        <label for="title">Titel</label>
        <input type="text" id="title" class="form-control" />
    </div>
    <div class="form-group">
        <label for="contents">Inhoud</label>
        <textarea class="form-control" id="contents"></textarea>
    </div>
</form>

@endsection