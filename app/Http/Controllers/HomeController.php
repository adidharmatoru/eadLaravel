<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check()) {
            $posts = DB::table('posts')->join('users', 'posts.user_id', '=', 'users.id')->select('posts.id', 'posts.user_id', 'posts.image', 'posts.caption', 'users.avatar', 'users.name', 'users.email')->paginate(5);

            return view('home')->with('posts', $posts);
        }
        return view('welcome');
    }
}
