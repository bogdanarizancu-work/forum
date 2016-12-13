<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\User;
use App\Post;
use Carbon\Carbon;

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
        Carbon::setLocale('ro');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($groupId = 0)
    {
        // get groups
        $groups = Group::all();

        // get groups
        $users = User::all();

        // get posts
        if ($groupId)
        {
            $posts = Post::with('author')->whereGroupId($groupId)->get();
        } else {
            $posts = Post::with('author')->get();
        }

        // return view
        return view('home', compact('groups', 'users', 'posts'));
    }

}
