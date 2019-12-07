<?php

namespace VoiceBook\Http\Controllers;
use VoiceBook\User;
use VoiceBook\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
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
     * Display the specified posts by tag.
     *
     * @param  Tag $tag
     * @return $this
     */
    public function show(Tag $tag)
    {
        $tags = Tag::latest()->limit(5)->get();

        $posts = $tag->posts()->paginate(10);

        $mightKnows = User::where('location',auth()->user()->location)
                            ->where('id', '!=', auth()->user()->id)
                            ->orderBy('name', 'desc')
                            ->get();

        return view('home')->with([
            'posts' => $posts,
            'user' => auth()->user(),
            'tags' => $tags,
            'mightKnows'=>$mightKnows
        ]);
    }
}
