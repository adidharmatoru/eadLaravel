<?php

namespace App\Http\Controllers;

use App\Komentar_Post;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $data = request()->validate([
            'comment' => 'required'
        ]);
        $comment = new Komentar_Post();
        try{
            $comment->user_id = Auth::id();
            $comment->post_id = $id;
            $comment->comment = $request->comment;

            $comment->save();
            if ($request->direct == "home"){
                return redirect('/');
            }else{
                return redirect()->route("post.show",$id);
            }
        }catch (\Exception $exception){
            $exception->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $like = Post::findOrFail($id);
        $like->likes = $like->likes + 1;
        $like->save();

        if ($request->direct == "home"){
            return redirect('/');
        }else{
            return redirect()->route("post.show",$id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
