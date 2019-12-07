
<div class="panel panel-default" style="background-color:transparent">
        @foreach($posts as $post)
        <div class="panel panel-default">
            <div class="media" style="padding: 20px 10px;">
                <div class="media-left" >
                    <a href="{{ url($post->user->username) }}">
                        <img class="media-object" src="{{ Request::is('tags/*') ? '../' : '' }}uploads/avatars/{{ $post->user->avatar }}" alt="avatar" style="width: 64px; height: 64px; border-radius:50%">
                    </a>
                </div>
                <div class="media-body ps"  id="test">
                    <h4 class="media-heading">
                        <a href="{{ url($post->user->username) }}">
                            <div class="auther">{{ $post->user->name }}</div><br>
                            <small>
                                {{ '@' . $post->user->username }}
                            </small>
                        </a>
                        <br>
                        <small class="date">
                            {{ $post->created_at->diffForHumans() }}
                        </small>

                    </h4>
                    <hr style="margin-top:0px;">
                    
                    <div class="post-body">{!! $post->body !!}</div>
                    <br>
                    @if($post->url != NULL)
                    <a href="/uploads/posts/{{$post->url}}">
                        <img style="width:90%; height:400px;" src="/uploads/posts/{{$post->url}}">
                    </a>
                    @endif

                    <div style="margin-top:10px">
                     <div class="pull-left">
                            @include('partials.like')
                  </div>
                    <div class="comments-title text-center">
                        <p class="text-muted"><i class="fa fa-comment" aria-hidden="true"></i>
                          <small>0</small>
                        </p>
                    </div>
                    </div>
                    <hr>
                    @include('partials.comment')

                    <div class="panel-body">
                      <form action="{{url('posts/' . $post->id . '/store') }}" method="post">
                          {{ csrf_field() }}
                      <div class="form-group">
                        <textarea name="body" placeholder="write comment" id="body" class="form-control" style="width:100%;height:40px"></textarea>
                      </div>

                      <div class="form-group add_comment">
                        <button type="submit" class="btn btn-primary">Add Comment</button>
                      </div>
                    </form>
                  </div>

                </div>
            </div>
            @if($posts->last() != $post)
            @endif
        </div>
        @endforeach
            {{ $posts->links() }}
</div>

<script type="text/javascript">
/*document.querySelectorAll('.auther').forEach(function(div) {
    artyom.say(div.innerText + "Updated His status");
});
*/



</script>
