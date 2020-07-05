@php
echo('<?xml version="1.0"?>');
@endphp
<rss version="2.0">
    <channel>
        <title>Pieters weblog</title>
        <description>A very nice blog for very nice people</description>
        <link>avalon.seanachaidh.be</link>
        @foreach ($articles as $article)
            <item>
                <title>{{$article->title}}</title>
                <description>{{$article->synopsis}}</description>
                <link>avalon.seanachaidh.be/articles/{{$article->id}}</link>
            </item>
        @endforeach
    </channel>
</rss>
