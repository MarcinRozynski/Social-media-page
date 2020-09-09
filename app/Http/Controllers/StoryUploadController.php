<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\controller;
use Validator,Redirect,Response,File;
use App\Story;

class StoryUploadController extends Controller
{
    public function index()
    {
        return view('simple_story_upload.blade.php');
    }

    public function store(Request $request)
    {
        request()->validate([
            'story_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($files = $request->file('story_image')) {
            // Define upload path
            $destinationPath = public_path('/story_image/');
            // Upload original image
            $storyImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destionationPath, $storyImage);

            $insert['image'] = "$storyImage";
            // Save in database
            $storymodel = new Story();
            $storymodel->photo_name="$storyImage";
            $storymodel->save();

        }
    }
}
