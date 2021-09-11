@extends('main')

@section('content')
<div class=overview-admin-content>
    <div class="sidepanel">
        <!-- create list of all articles -->
        @foreach($view->articles as $a)
            <x-article-item :index="$loop->index" :article="$a"/>
        @endforeach
        <div>
            <button class="form-control btn btn-success">nieuw</button>
        </div>
    </div>
    <div class="mainpanel">
        <!-- hier moet ik nog parameters aan geven -->
        <x-article-editor>

        </x-article-editor>
    </div>    
</div>
@endsection

