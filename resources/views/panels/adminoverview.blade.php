@extends('main')

@section('content')
<div class=overview-admin-content>
    <div class="sidepanel">
        <!-- create list of all articles -->
        @foreach($view->articles as $a)
            <x-article-item :index="$loop->index" :article="$a"/>
        @endforeach
    </div>
    <div class="mainpanel">
    dit is de mainpanel
    </div>    
</div>
@endsection

