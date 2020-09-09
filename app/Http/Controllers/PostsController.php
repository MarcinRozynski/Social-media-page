<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    // Metoda do autoryzacji //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        auth()->user()->posts()->create([
           'caption' => $data['caption'],
           'image' => $imagePath,
           'like' => 0,
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    // public function updateLikes(){

    // }

    public function show(\App\Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
