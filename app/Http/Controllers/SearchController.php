<?php

namespace VoiceBook\Http\Controllers;

use Illuminate\Http\Request;
use VoiceBook\User;

class SearchController extends Controller
{

  public function getResults(Request $request)
  {

      $query = $request->input('query');
        if (!$query) {
        return redirect()->route('home');
      }

      $users = User::where('name','LIKE',"%{$query}%")
      ->orWhere('email','LIKE',"%{$query}%")
      ->orWhere('username','LIKE',"%{$query}%")
      ->get();


      return view('search.results')->with('users',$users);

}
}
