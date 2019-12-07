<?php

namespace VoiceBook\Http\Controllers;
use Illuminate\Http\Request;
use VoiceBook\Comment;
use VoiceBook\Post;
use Auth;
use Session;

class CommentController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }


    public function store(Post $post){
    Comment::create([ "user_id" => auth()->user()->id,
                    "post_id" => $post->id,
                    "body" => request("body")
          ]);
          return redirect()->back();
}
}
