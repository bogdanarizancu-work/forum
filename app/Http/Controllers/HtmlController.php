<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\User;
use App\Post;
use Carbon\Carbon;

class HtmlController extends Controller
{

    public function __construct()
    {
        setlocale(LC_TIME, 'Romanian');
    }

    public function index()
    {
        // get groups
        $groups = Group::take(10)->get();

        // get groups
        $users = User::take(10)->get();

        // get posts
        $posts = Post::with('author')->take(5)->get();

        return view('html', compact('groups', 'users', 'posts'));
    }
}
