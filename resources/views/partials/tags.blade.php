
<div class="panel panel-default">
    <div class="panel-heading" style="background-color:#337ab7;color:white">Trends tags</div>

    <div class="panel-body">
        @foreach($tags as $tag)
            <p><a href="{{ Request::is('tags/*') ? '../' : '' }}tags/{{ $tag->id }}" class="tags">#{{ $tag->name }}</a></p>
        @endforeach
    </div>
</div>
