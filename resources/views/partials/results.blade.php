<div class="panel panel-default">
    <div class="panel-heading">Results</div>

    <div class="panel-body">
      @if (count($users) > 0)
        @foreach($users as $user)
        <div class="media">
            <div class="media-left">
                <a href="{{ url($user->username) }}">
                    <img class="media-object" src="../uploads/avatars/{{ $user->avatar }}" alt="avatar" style="width: 64px; height: 64px;border-radius: 50%;">
                </a>
            </div>
            <div class="media-body">
                <h4 class="media-heading" class="small_name">
                    <a href="{{ url($user->username) }}">
                        {{ $user->name }}
                        <small>
                            {{ '@' . $user->username }}
                        </small>
                    </a>
                </h4>
            </div>
        </div>
        @endforeach
        @else
        <h1> Not Found</h1>
        @endif
    </div>
</div>
