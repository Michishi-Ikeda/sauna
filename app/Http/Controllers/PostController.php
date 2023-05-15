<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\dd;
use App\Models\Post;
use App\Models\Sauna;

class PostController extends Controller
{
    public function index(Post $post, Sauna $sauna)
    {
       
        $posts = Post::with('sauna')->get();
        return view('posts.index', compact('posts'));
        //return view('posts/index')->with(['posts' => $post->getPaginateByLimit()]);  
       //blade内で使う変数'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$postを代入。
    }
    
    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post]);
     //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
    }
    
    public function create(Sauna $sauna)
    {
        $saunas = \DB::table('saunas')->get();
        //dd($saunas);
        return view('posts/create')->with(['saunas' => $saunas]);
    }
    
    public function store(Request $request, Post $post)
    {
        $input = $request['post'];
        $input+=['user_id' => Auth::id()];
        //dd($input);
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post)
    {
    return view('posts/edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {   
    $input_post = $request['post'];
    $post->fill($input_post)->save();

    return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
    
}
