<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        // Get all posts, latest first
        $posts = Post::with('user')->latest()->get();
        return view('blogs', ['posts' => $posts]);
    }

    public function showEditScreen(Post $post){
        if (auth()->user()->id !== $post->user_id) {
            return redirect('/');
        }
        return view('edit-post',['post' => $post]);
    }
    public function createPost(Request $request){

        $incomingFields =$request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string|max:1000',
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['user_id'] = auth()->id();

        Post::create($incomingFields); 
        return redirect('/')->with('success', 'Post created successfully!');
    }

    public function updatePost(Post $post, Request $request) {
        if (auth()->user()->id !== $post->user_id) {
            return redirect('/');
        }

        $incomingFields = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string|max:1000',
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);

        $post->update($incomingFields);
        return redirect('/')->with('success', 'Post updated successfully!');
    }


    public function deletePost(Post $post) {
        if (auth()->user()->id === $post->user_id) {
            $post->delete();
        }
        return redirect('/')->with('success', 'Post deleted successfully!');
    }
}
