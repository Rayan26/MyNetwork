<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()   //redirige vers login si essais d'aller a /p/* non connecter
    {
        $this->middleware('auth');
    }


    public function create()
    {
        return view('posts.create');
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');

        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);

        return view('posts.index', compact('posts'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required',
            'caption' => '',
            'image' => ['required', 'image'],
        ]);

        $imagePath = request('image')->store('uploads', 'public'); //creer le dossier storage sil nexiste pas

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        auth()->user()->posts()->create([
            'title' => $data['title'],
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(Post $post)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($post->user->id) : false;

        return view('posts.show', compact('post','follows'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }
}
