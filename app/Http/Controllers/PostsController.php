<?php

namespace App\Http\Controllers;

use App\Post;
use App\Like;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;

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

    public function show(\App\Post $post)
    {
        return view('posts.show', compact('post'));
    }

    // LIKES SYSTEM

    public function getlike(Post $post)
    {
        return response()->json([
            'count'=>$post->likes()->count(),
        ]);
    }
    public function like(Post $post)
    {
        $userLikes = Like::where([
            'user_id'=>Auth::id(),
            'post_id'=>$post->id,
        ])->exists();


        if($userLikes){

            // dd($post);

            Like::where([
                'user_id'=>Auth::id(),
                'post_id'=>$post->id,
            ])->delete();
        }else{
            Like::create([
                'user_id'=>Auth::id(),
                'post_id'=>$post->id,
            ]);
        }

        return response()->json([
            'message'=>'Thanks',
        ]);
    }

    // END LIKES SYSTEM

}
