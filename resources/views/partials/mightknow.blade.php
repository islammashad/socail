
<div class="panel panel-default">
    <div class="panel-heading" style="background-color:#337ab7;color:white">Might Know</div>

    <div class="panel-body" >
        @foreach($mightKnows as $mightKnow)
        <div class="media">
            <div class="media-left">
                <a href="{{ url($mightKnow->username) }}">
                    <img class="media-object" src="../uploads/avatars/{{ $mightKnow->avatar }}" alt="avatar" style="width: 64px; height: 64px; border-radius:50%">
                </a>
            </div>
            <div class="media-body">
                <h4 class="media-heading">
                    <a href="{{ url($mightKnow->username) }}" class="might_know_name">
                        {{ $mightKnow->name }}

                    </a>
                    <br>
                    <small>
                        {{ '@' . $mightKnow->username }}
                    </small>
                </h4>
            </div>
            <hr style="margin:5px;">
        </div>
        @endforeach
    </div>
</div>
