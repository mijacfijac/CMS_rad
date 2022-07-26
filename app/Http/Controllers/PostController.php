<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    protected $posts;

    public function __construct(PostRepository $postRepository)
    {
        $this->middleware('auth')->except(['postDetails']);
        $this->posts = $postRepository;
    }

    public function getPostsView(Request $request)
    {
        if(auth()->user()->role->name==='Administrator' || auth()->user()->role->name==='Editor') {
            $postsForView = $this->posts->forAdmin();
        }
        else {
            $postsForView = $this->posts->forUser($request->user());
        }
        
        return view('posts', [
            'posts' => $postsForView 
        ]);
    }

    public function getNewPostView()
    {
        return view('newpost');
    }

    public function saveNewPost(Request $request)
    {
        $post = new Post();
        $post->name = $request->name;
        $post->description = $request->description;      

        $post->user_id = Auth::user()->getId();
        $file = $request->file('image');
        $destinationPath = '../public/uploads';
        $post->image= $post->name.'_'.$file->getClientOriginalName();
        $file->move($destinationPath, $post->name.'_'.$file->getClientOriginalName());

        $post->save();

        return redirect("/posts");
    }

    public function savePost(Request $request, Post $post)
    {
        $post->name = $request->name;
        $post->description = $request->description;      

        $post->user_id = Auth::user()->getId();
        if ($request->hasFile('image')) {
          $file = $request->file('image');
          $destinationPath = '../public/uploads';
          $post->image= $post->name.'_'.$file->getClientOriginalName();
          $file->move($destinationPath, $post->name.'_'.$file->getClientOriginalName());
        }

        $post->save();

        return redirect("/posts");
    }

    public function postEdit(Post $post)
    {
        return view('postEdit', [
            'post' => $post,
        ]);
    }

    public function deletePost(Request $request,  Post $post)
    {
        $post->delete();
        return redirect('/posts');
    }

    public function postDetails(Post $post)
    {
        return view('postView', [
            'post' => $post,
        ]);
    }
    
}
