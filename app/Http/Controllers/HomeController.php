<?php

namespace VoiceBook\Http\Controllers;
use VoiceBook\User;
use VoiceBook\Post;
use VoiceBook\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show user news feed.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $followees = Auth::user()->followees()->pluck('id')->all();

        array_push($followees, Auth::user()->id);

        $posts = Post::whereIn('user_id', $followees)->latest()->paginate(10);

        $tags = Tag::latest()->limit(5)->get();

        $mightKnows = User::where('location',Auth::user()->location)
                  ->where('id', '!=', Auth::user()->id)
                 ->orderBy('name', 'desc')
                 ->get();
        return view('home', ['user' => Auth::user(), 'mightKnows' => $mightKnows ,'posts' => $posts, 'tags' => $tags ]);


    }
}
