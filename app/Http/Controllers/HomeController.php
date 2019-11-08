<?php

namespace App\Http\Controllers;

use App\Komentar_Post;
use App\Post;
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
            $posts = Post::with('user')->
            latest()->paginate(5);
            foreach ($posts as $post){
                $comment = Komentar_Post::where('post_id',$post->id)->with('user')->get();
                return view('home', compact('comment'))->with('posts', $posts);
            }
        }
        return view('welcome');
    }
}
