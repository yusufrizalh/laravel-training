<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        // return Post::get(['title', 'slug']);
        // $posts = Post::get();
        // $posts = Post::take(3)->get();
        // $posts = Post::paginate(3);
        return view('posts/index', ['posts' => Post::latest()->paginate(3)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('/posts/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /*
        # Fitur untuk keamanan Form
          - @csrf       : menghindari malware, ransomware, vulnerability
          - $fillable   : membatasi form / menentukan mana yg bisa diinput
          - $guarded    : semua input boleh diisi
    */

    public function store()
    {
        // $post = new Post();
        // $post->title = $request->title;
        // $post->slug = \Str::slug($request->title);
        // $post->body = $request->body;
        // $post->save();
        // return redirect()->to('/posts');

        // membuat data secara mass assignment
        // aturan: daftarkan properties kedalam $fillable -> ada di Model Post 
        // Post::create([
        //     'title' => $request->title,
        //     'slug' => \Str::slug($request->title),
        //     'body' => $request->body,
        // ]);

        // $this->validate($request, [
        //     'title' => 'required|min:12|max:38',
        //     'body' => 'required',
        // ]);
        // $post = $request->all();
        // $post['slug'] = \Str::slug($request->title);
        // Post::create($post);

        // $attrs = $request->validate([
        //     'title' => 'required|min:8|max:38',
        //     'body' => 'required',
        // ]);
        // $attrs['slug'] = \Str::slug($request->title);
        // Post::create($attrs);

        $attrs = request()->validate([
            'title' => 'required|min:8|max:38',
            'body' => 'required',
        ]);
        $attrs['slug'] = \Str::slug(request('title'));
        Post::create($attrs);
        session()->flash('success', 'Post berhasil disimpan!');

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // untuk menampilkan read more
        return view('posts/show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */

    public function edit(Post $post)
    {
        return view('posts/edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */

    public function update(Post $post)
    {
        // testing proses update
        // dd('berhasil update');

        $attrs = request()->validate([
            'title' => 'required|min:8|max:38',
            'body' => 'required',
        ]);

        $post->update($attrs);
        session()->flash('success', 'Post berhasil diubah!');

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
