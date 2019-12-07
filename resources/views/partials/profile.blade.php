<script type="text/javascript">
function uploadProfileImage(){
    var form_name = '#form-new-image';
    $(form_name+' .image-input').click();
}
</script>
<div class="panel panel-default">
    <div class="panel-body">

        <img src="/uploads/avatars/{{ $user->avatar }}" class="img-responsive" alt="Responsive image" style="
    width: 200px;
    height: 200px;
    border: 7px solid #c8d6f7;
    border-radius:50%;
    margin:0px auto;
    ">
           @if(Auth::user() == $user)
            <form enctype="multipart/form-data" action="/profile" method="POST" id="form-new-image">
                {{ csrf_field() }}<br>
                <button type="button" class="btn btn-primary" onclick="uploadProfileImage()">
                     change
                </button>
                <input type="file" name="avatar" style="display:none" class="image-input">
                <input type="submit"value="Update" class=" btn btn-primary pull-right">
            </form>
            <br>
            <br>
            <div style="
                      border: 1px solid #AAA;
                      margin: 20px auto;
                      height: 51px;
                      width: 90%;
                      background-color:white;
                      border-radius: 10px;
                      text-align: center;
                      box-shadow: 0px 0px 5px #e6e6e6;">
               <div class="col-xs-6 panel-body" style="border-right: 1px solid #AAA;">
                    <a href="/inbox">Inbox</a>
               </div>
               <div class="col-xs-6 panel-body">
                <a href="/outbox">Outbox</a>
               </div>
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
        @endif
        <br>

        <div>
            <div class="col-sm-4 text-center">
             <div class="panel-body cycle" style="background:#2a5c95">
               <a href="{{ url($user->username) }}">{{ $user->posts->count() }}</a>
             </div>
             <span >Posts</span>
            </div>
            <div class="col-sm-4 text-center">
             <div class="panel-body cycle" style="background:#45bab6">
               <a href="{{ url($user->username . '/followees') }}">{{ $user->followees->count() }}</a>
             </div>
             <span>Followees</span>
            </div>
            <div class="col-sm-4 text-center">
             <div class="panel-body cycle" style="background:#b074cc">
               <a href="{{ url($user->username . '/followers') }}">{{ $user->followers->count() }}</a>
             </div>
             <span>Followers</span>
            </div>
        </div>
        <div class="clear"></div><br>
        <!--
        <div class="btn-group btn-group-justified btn-group-sm" role="group" aria-label="...">
            <a type="button" class="btn btn-default" href="{{ url($user->username) }}">Posts<br>{{ $user->posts->count() }}</a>
            <a type="button" class="btn btn-default" href="{{ url($user->username . '/followees') }}">Followees<br>{{ $user->followees->count() }}</a>
            <a type="button" class="btn btn-default" href="{{ url($user->username . '/followers') }}">Followers<br>{{ $user->followers->count() }}</a>
        </div>
      -->
</div>
</div>

      <div class="panel panel-primary follow">
        <div class="panel-heading" id="start_follow" style="color: white;text-transform:capitalize">{{ $user->name }}'s details</div>
        <div style="padding-left:10px;">
          <h2 style="text-transform: capitalize;"></h2>
          <p><i class="fa fa-user" ></i> &nbsp; <a href="/{{ $user->username }}">{{ '@' . $user->username }}</a></p>
          <p><i class="fa fa-phone" ></i> &nbsp; {{ $user->phone}}</p>
          <p><i class="fa fa-birthday-cake" ></i> &nbsp; {{ \Carbon\Carbon::parse($user->birthday)->format('j F Y') }}</p>
          <p><i class="fa fa-map-marker" ></i> &nbsp; {{ $user->location }}</p>
        </div>
      </div>
