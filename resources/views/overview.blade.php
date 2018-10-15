@extends('main')

@section ('content')
    <h1> testing testing </h1>
    @foreach ($articles as $article)
        <div class="artview">
            <h3> {{ $article->title }} </h3>
            <div class="arttext">
                {{ $article->contents }}
            </div>
        </div>
        <hr />
    @endforeach

@endsection