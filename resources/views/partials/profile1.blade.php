<div class="panel panel-default">
    <div class="panel-body">

        <img src="/uploads/avatars/{{ $user->avatar }}" class="img-responsive" alt="Responsive image">
        @if(Auth::user() == $user)
            <form enctype="multipart/form-data" action="/profile" method="POST">
                {{ csrf_field() }}
                @endif
                <label>Update Profile Image</label>
                <input type="file" name="avatar">
                <input type="submit" value="Update" class="pull-right btn btn-xs btn-default">
            </form>
            <br>
            <br>
            <div class="btn-group btn-group-justified btn-group-sm" role="group" aria-label="...">
                <a role="button" class="btn btn-default" href="/inbox">Inbox</a>
                <a role="button" class="btn btn-default" href="/outbox">Outbox</a>
            </div>
        @else
            <br>
            @if($user->followers->contains(Auth::user()))
                <form method="post" action="{{ url('follows/' . $user->username) }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-default btn-block">Unfollow</button>
                </form>
            @else
                <form method="post" action="{{ url('follows/' . $user->username) }}">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary btn-block">Follow</button>
                </form>
        @endif
        <br>
        <div class="btn-group btn-group-justified btn-group-sm" role="group" aria-label="...">
            <a type="button" class="btn btn-default" href="{{ url($user->username) }}">Posts<br>{{ $user->posts->count() }}</a>
            <a type="button" class="btn btn-default" href="{{ url($user->username . '/followees') }}">Followees<br>{{ $user->followees->count() }}</a>
            <a type="button" class="btn btn-default" href="{{ url($user->username . '/followers') }}">Followers<br>{{ $user->followers->count() }}</a>
        </div>

    </div>
</div>
