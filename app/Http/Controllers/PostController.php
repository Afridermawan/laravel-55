<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Category;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(env('PER_PAGE'));

        return view('post.index', compact('posts'));
    }

    public function create()
    {
    	$categories = Category::all();

    	return view('post.create', compact('categories')); 
    }

    public function store()
    {
        $this->validate(request(), [
            'title'         =>  'required',
            'content'       =>  'required|min:10',
        ]);

    	Post::create([
    		'title'			=>	request('title'),
    		'content'		=>	request('content'),
    		'category_id'	=>	request('category_id'),
    		'slug'			=>	str_slug(request('title')),
    	]);

    	return redirect()->route('post.index')->withSuccess('Post berhasil ditambah');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('post.edit', compact('post', 'categories'));
    }

    public function update(Post $post)
    {
        $post->update([
            'title'         =>  request('title'),
            'content'       =>  request('content'),
            'category_id'   =>  request('category_id'),
            'slug'          =>  str_slug(request('title')),
        ]);

        return redirect()->route('post.index')->withSuccess('Post berhasil diubah');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('post.index')->withDanger('Post berhasil dihapus');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }
}
