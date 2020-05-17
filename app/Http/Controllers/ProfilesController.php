<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        $followers = $user->followers;
        $followings = $user->followings;
        return view('profiles.index', compact('user', 'followers', 'followings'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);


        if(request('image')){
            $imagePath = request('image')->store('profile', 'public');
            // dd(public_path("$imagePath"));
            $image = Image::make(public_path("storage/$imagePath"))->fit(1000, 1000);
            // dd($imagePath);
            $image->save();
        }


        auth()->user()->profile->update(array_merge(
            $data,
            ['image' => 'storage/' . $imagePath]
        ));

        return redirect("/profile/{$user->id}");
    }







    /**
     * Obserwuj użytkownika
     *
     * @param $profileId
     *
     */
    public function followUser(User $user)
    {
        if(! $user) {
            
            return redirect()->back()->with('error', 'User does not exist.'); 
        }

            $user->followers()->attach(auth()->user()->id);
            return redirect()->back()->with('success', 'Successfully followed the user.');
    }


    public function unFollowUser(User $user)
    {
        if(! $user) {
            
            return redirect()->back()->with('error', 'User does not exist.'); 
        }

        $user->followers()->detach(auth()->user()->id);
        return redirect()->back()->with('success', 'Successfully unfollowed the user.');
    }

    public function show(User $user)
    {
        $followers = $user->followers;
        return view('followers.show', compact('user', 'followers'));
        
    }

    public function showFollowings(User $user)
    {
        $followings = $user->followings;
        return view('followings.show', compact('user' , 'followings'));
        
    }

}
