@extends('main')

@section('content')
<div class=overview-admin-content>
    <div class="sidepanel">
        <!-- create list of all articles -->
        @foreach($view->articles as $a)
            <x-article-item :index="$loop->index" :article="$a"/>
        @endforeach
        <div>
            nieuw
        </div>
    </div>
    <div class="mainpanel">

    </div>    
</div>
@endsection

