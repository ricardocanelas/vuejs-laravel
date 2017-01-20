<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class VuejsPostController extends Controller
{

    public function index()
    {
        return view("posts.vuejs");
    }

    public function all()
    {
        return Post::all();
    }


    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'slug' => 'required|unique:posts|max:255',
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        Post::forceCreate($request->all())->save();

        return ['message' => 'Post created!'];
    }


    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }


    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'slug' => 'required|unique:posts|max:255',
            'title' => 'required|max:255',
            'body' => 'required',
        ]);
        Post::find($id)->update($request->all());
        return redirect('posts')->withSuccess('Post has been updated!');
    }


    public function destroy($id)
    {
        Post::destroy($id);
        return redirect('posts');
    }
}
