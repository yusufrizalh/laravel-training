<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostRequest;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        // return Post::get(['title', 'slug']);
        // $posts = Post::get();
        // $posts = Post::take(3)->get();
        // $posts = Post::paginate(3);
        return view('posts/index', ['posts' => Post::latest()->paginate(3)]);
    }

    public function create()
    {
        return view('posts/create', ['post' => new Post(), 'categories' => Category::get()]);
    }

    /*
        # Fitur untuk keamanan Form
          - @csrf       : menghindari malware, ransomware, vulnerability
          - $fillable   : membatasi form / menentukan mana yg bisa diinput
          - $guarded    : semua input boleh diisi
    */

    public function store(PostRequest $request)
    {
        $attrs = $request->all();

        $attrs['slug'] = \Str::slug(request('title'));

        $attrs['category_id'] = request('category');

        $post = auth()->user()->posts()->create($attrs);

        session()->flash('success', 'Post berhasil disimpan!');

        return redirect('/posts');
    }

    public function show(Post $post)
    {
        // untuk menampilkan read more
        return view('posts/show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts/edit', ['post' => $post, 'categories' => Category::get()]);
    }

    public function update(Post $post, PostRequest $request)
    {
        $this->authorize('update', $post);

        $attrs = $request->all();
        $attrs['category_id'] = request('category');
        $post->update($attrs);

        session()->flash('success', 'Post berhasil diubah!');
        return redirect('/posts');
    }

    public function destroy(Post $post)
    {
        if (auth()->user()->is($post->author)) {
            $post->delete();
            session()->flash('success', 'Post berhasil dihapus!');
            return redirect()->to('/posts');
        } else {
            session()->flash('error', 'Post ini bukan milik anda!');
            return redirect()->to('/posts');
        }
    }
}
